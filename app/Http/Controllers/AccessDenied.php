<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AccessDenied extends Controller
{
    private const CACHE_DURATION = 6;

    public function blockUser(Request $request)
    {
        if ($this->isInBlackList($request->ip())) {
            return view('access-denied');
        }
        return redirect('/');
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
}
