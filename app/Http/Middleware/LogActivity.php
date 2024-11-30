<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

class LogActivity
{
    public function handle(Request $request, Closure $next)
    {
        // Exclude /getBall route from logging
        if ($request->path() === 'user/getBall') {
            return $next($request); // Skip logging for this route
        }

        // Start time measurement
        $startTime = microtime(true);

        // Proceed with the request
        $response = $next($request);

        // Calculate latency
        $latency = microtime(true) - $startTime;

        // Get request details
        $queryParams = json_encode($request->query());
        $requestBody = json_encode($request->all());
        $rawJson = json_encode(json_decode($request->getContent(), true));

        // Set default values for latitude and longitude
        $latitude = null;
        $longitude = null;

        // Get the user's IP address
        $ipAddress = $request->ip();

        // Use ipinfo.io API to get location data (free tier)
        try {
            $locationData = file_get_contents("https://ipinfo.io/{$ipAddress}/json");
            $locationData = json_decode($locationData, true);

            // Extract latitude and longitude if available
            if (isset($locationData['loc'])) {
                // ipinfo.io returns location as a string "lat,long"
                list($latitude, $longitude) = explode(",", $locationData['loc']);
            }
        } catch (\Exception $e) {
            // Handle errors (e.g., network issues) gracefully
            $latitude = null;
            $longitude = null;
        }

        // Log the activity if the user is authenticated
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
