<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

class LogActivity
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->path() === 'user/getBall' || $request->path() === 'register') {
            return $next($request);
        }
        $startTime = microtime(true);

        $response = $next($request);
        $latency = microtime(true) - $startTime;
        $queryParams = json_encode($request->query());
        $requestBody = json_encode($request->all());
        $rawJson = json_encode(json_decode($request->getContent(), true));
        $latitude = null;
        $longitude = null;

        $ipAddress = $request->ip();
        try {
            $locationData = file_get_contents("https://ipinfo.io/{$ipAddress}/json");
            $locationData = json_decode($locationData, true);
            if (isset($locationData['loc'])) {
                list($latitude, $longitude) = explode(",", $locationData['loc']);
            }
        } catch (\Exception $e) {
            $latitude = null;
            $longitude = null;
        }
        if (auth()->check()) {
            ActivityLog::create([
                'user_id' => auth()->user()->id,
                'role' => auth()->user()->role,
                'method' => $request->method(),
                'menu' => $request->path(),
                'action' => 'akses menu',
                'ip_address' => $ipAddress,
                'browser' => $request->header('User-Agent'),
                'query_params' => $queryParams,
                'request_body' => $requestBody,
                'raw_json' => $rawJson,
                'latency' => $latency,
                'is_failed' => false,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'response_code' => $response->status(),
                'response_body' => json_encode($response->getOriginalContent()),
            ]);
        }

        return $response;
    }
}
