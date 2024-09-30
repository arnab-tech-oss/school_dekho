<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Closure;

class RateLimit
{
    protected $crawlerUserAgents;
    protected $crawlerMaxAttempts;
    protected $userMaxAttempts;

    private const CACHE_DURATION = 6;

    public function __construct()
    {
        $this->crawlerMaxAttempts = config('rate_limiting.crawler_max_attempts', 10);
        $this->userMaxAttempts = config('rate_limiting.user_max_attempts', 60);
    }

    public function handle(Request $request, Closure $next)
    {
        $isCrawler = $this->isCrawler($request);
        $maxAttempts = $isCrawler ? $this->crawlerMaxAttempts : $this->userMaxAttempts;
        $rateLimitKey = $this->generateRateLimitKey($request, $isCrawler);

        if (RateLimiter::tooManyAttempts($rateLimitKey, $maxAttempts)) {
            return $this->handleRateLimitExceeded($request, $rateLimitKey);
        }

        RateLimiter::hit($rateLimitKey);

        return $next($request);
    }

    protected function isCrawler(
        Request $request,
    ): bool {
        return $this->testIPAddress($request->ip(), 'allowlist_ipv4', 'allowlist_ipv4_', 'allowlist_ipv6', 'allowlist_ipv6_');
    }

    protected function generateRateLimitKey(Request $request, bool $isCrawler): string
    {
        $key = $isCrawler ? $request->userAgent() : ($request->user()?->id ?: $request->ip());
        $crc32Hash = crc32($key);
        $hashHex = sprintf('%08x', $crc32Hash);

        return 'global:' . $hashHex;
    }

    protected function handleRateLimitExceeded(Request $request, string $rateLimitKey)
    {
        $retryAfter = RateLimiter::availableIn($rateLimitKey);

        Log::channel('filter')->alert('Rate limit exceeded', [
            'ip' => $request->ip(),
            'user_id' => $request->user()?->id,
            'user_agent' => $request->header('User-Agent'),
            'rate_limit_key' => $rateLimitKey,
            'rate_limit' => $this->crawlerMaxAttempts,
            'retry_after' => $retryAfter,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            // 'headers' => $request->headers->all(),
        ]);

        return response()
            ->json(['message' => 'Too many requests'], 429)
            ->header('Retry-After', $retryAfter);
    }

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
