<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class SecurityController extends Controller
{
    private const CACHE_DURATION_HOURS = 6;
    private const COOKIE_NAME = 'VALIDATED-USER-TOKEN';

    public function securityPage(Request $request)
    {
        $cookieValue = $request->cookie(self::COOKIE_NAME);
        $userIp = $request->ip();

        if ($this->isUsingVpn($userIp)) {
            if (($cookieValue === $userIp)) {
                return redirect('/');
            }
            return view('security-check');
        }
        return redirect('/');
    }

    public function handleForm(Request $request)
    {
        $request->validate([
            '_answer' => 'required|simple_captcha',
        ]);

        $redirectUrl = $request->input('redirect', '/');
        $ipAddress = $request->ip();

        $cookie = Cookie::make(self::COOKIE_NAME, $ipAddress, 60);

        return response()
            ->view('security-check', compact('redirectUrl'))
            ->cookie($cookie);
    }

    protected function isUsingVpn(string $ip): bool
    {
        $isIpv4 = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
        $isIpv6 = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);

        $table = $isIpv4 ? 'vpnlist_ipv4' : 'vpnlist_ipv6';
        $cacheKeyPrefix = $isIpv4 ? 'vpnlist_ipv4_' : 'vpnlist_ipv6_';

        if (!$isIpv4 && !$isIpv6) {
            return false;
        }

        $convertedIp = $isIpv4 ? ip2long($ip) : bin2hex(inet_pton($ip));
        $cacheKey = $cacheKeyPrefix . $convertedIp;

        return Cache::remember($cacheKey, now()->addHours(self::CACHE_DURATION_HOURS), function () use ($convertedIp, $table) {
            return DB::connection('sqlite_ips')
                ->table($table)
                ->where('start_ip', '<=', $convertedIp)
                ->where('end_ip', '>=', $convertedIp)
                ->exists();
        });
    }
}
