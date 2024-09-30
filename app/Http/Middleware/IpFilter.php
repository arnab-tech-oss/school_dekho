<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Closure;

class IpFilter
{
    private const CACHE_DURATION = 6;  // Cache duration in hours for VPN checks

    public function handle(Request $request, Closure $next)
    {
        $cookieValue = $request->cookie('VALIDATED-USER-TOKEN');
        $userIp = $request->ip();
        $fullUrl = $request->fullUrl();
        $userAgent = $request->header('User-Agent');
        $rateLimitKey = 'user-agent:' . md5($userAgent);

        if ($request->is('security-check')) {
            return $next($request);
        }

        if ($request->is('access-denied')) {
            return $next($request);
        }
        if ($cookieValue && ($cookieValue === $userIp)) {
            return $next($request);
        }

        if ($this->isAllowed($userIp)) {
            Log::channel('filter')->info('ALLOWLIST: IP address permitted.', ['ip' => $userIp, 'userAgent' => $userAgent, 'url' => $fullUrl]);

            return $next($request);
        }

        if ($this->isInBlackList($userIp)) {
            Log::channel('filter')->critical('BLACKLIST: IP address blocked.', ['ip' => $userIp, 'userAgent' => $userAgent, 'url' => $fullUrl]);
            return redirect('/access-denied');
        }

        if ($this->isUsingVpn($userIp)) {
            Log::channel('filter')->warning('VPN/PROXY DETECTED: IP address flagged.', ['ip' => $userIp, 'userAgent' => $userAgent, 'url' => $fullUrl]);
            return redirect('/security-check?redirect=' . $fullUrl);
        }

        return $next($request);
    }

    protected function isUsingVpn(string $ip): bool
    {
        return $this->testIPAddress($ip, 'vpnlist_ipv4', 'vpnlist_ipv4_', 'vpnlist_ipv6', 'vpnlist_ipv6_');
    }

    protected function isAllowed(string $ip): bool
    {
        return $this->testIPAddress($ip, 'allowlist_ipv4', 'allowlist_ipv4_', 'allowlist_ipv6', 'allowlist_ipv6_');
    }

    protected function isInBlackList(string $ip): bool
    {
        $convertedIp = ip2long($ip);

        $cacheKey = 'blocklist_ipv4_' . $convertedIp;

        $cacheDuration = self::CACHE_DURATION;
        return Cache::remember($cacheKey, now()->addHours($cacheDuration), function () use ($convertedIp) {
            $query = DB::connection('sqlite_ips')->table('blacklist_ipv4');
            return $query
                ->where('ip', '=', $convertedIp)
                ->exists();
        });
    }

    /**
     * Check if an IP address (IPv4 or IPv6) is in the given table and cache the result.
     *
     * @param string $ip
     * @param string $ipv4Table
     * @param string $ipv4CacheKeyPrefix
     * @param string $ipv6Table
     * @param string $ipv6CacheKeyPrefix
     * @return bool
     */
    private function testIPAddress(string $ip, string $ipv4Table, string $ipv4CacheKeyPrefix, string $ipv6Table, string $ipv6CacheKeyPrefix): bool
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return $this->checkIp($ip, $ipv4Table, $ipv4CacheKeyPrefix, true);
        }

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return $this->checkIp($ip, $ipv6Table, $ipv6CacheKeyPrefix, false);
        }

        return false;
    }

    /**
     * Check if an IP address is blocked based on its type and cache the result.
     *
     * @param string $ip
     * @param string $table
     * @param string $cacheKeyPrefix
     * @param bool $isIpv4
     * @return bool
     */
    private function checkIp(string $ip, string $table, string $cacheKeyPrefix, bool $isIpv4): bool
    {
        $convertedIp = $isIpv4 ? ip2long($ip) : bin2hex(inet_pton($ip));

        $cacheKey = $cacheKeyPrefix . $convertedIp;

        $cacheDuration = self::CACHE_DURATION;

        return Cache::remember($cacheKey, now()->addHours($cacheDuration), function () use ($convertedIp, $table, $isIpv4) {
            $query = DB::connection('sqlite_ips')->table($table);

            $column = $isIpv4 ? 'start_ip' : 'start_ip';
            $endColumn = $isIpv4 ? 'end_ip' : 'end_ip';

            return $query
                ->where($column, '<=', $convertedIp)
                ->where($endColumn, '>=', $convertedIp)
                ->exists();
        });
    }
}
