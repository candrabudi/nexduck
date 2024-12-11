<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
use Jenssegers\Agent\Agent;

class LogActivity
{
    public function handle(Request $request, Closure $next)
    {
        $excludedRoutes = ['user/getBall', 'register'];

        if (in_array($request->path(), $excludedRoutes)) {
            return $next($request);
        }

        $startTime = microtime(true);
        $response = $next($request);
        $latency = microtime(true) - $startTime;

        $queryParams = json_encode($request->query());
        $requestBody = json_encode($request->all());
        $rawJson = json_encode(json_decode($request->getContent(), true));
        $ipAddress = $request->ip();

        $agent = new Agent();
        $agent->setUserAgent($request->header('User-Agent'));
        $browser = $agent->browser();
        $platform = $agent->platform();
        $browserPlatform = $browser . ' - ' . $platform;

        $latitude = null;
        $longitude = null;
        $country = null;
        $city = null;
        $region = null;

        try {
            $locationData = file_get_contents("http://ip-api.com/json/{$ipAddress}?fields=status,message,country,regionName,city,lat,lon");
            $locationData = json_decode($locationData, true);
            
            if ($locationData['status'] === 'success') {
                $latitude = $locationData['lat'];
                $longitude = $locationData['lon'];
                $country = $locationData['country'];
                $city = $locationData['city'];
                $region = $locationData['regionName'];
            }
        } catch (\Exception $e) {
            $latitude = null;
            $longitude = null;
            $country = null;
            $city = null;
            $region = null;
        }

        if (auth()->check()) {
            ActivityLog::create([
                'user_id' => auth()->user()->id,
                'role' => auth()->user()->role,
                'method' => $request->method(),
                'menu' => $request->path(),
                'action' => 'akses menu',
                'ip_address' => $ipAddress,
                'browser' => $browserPlatform,
                'query_params' => $queryParams,
                'request_body' => $requestBody,
                'raw_json' => $rawJson,
                'latency' => $latency,
                'is_failed' => false,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'country' => $country,
                'city' => $city,
                'region' => $region,
                'response_code' => $response->status(),
                'response_body' => json_encode($response->getOriginalContent()),
            ]);
        }

        return $response;
    }
}
