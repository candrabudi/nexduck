<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;

class LogActivityController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::all(); // Fetch all activity logs
        return view('backend.activity_logs.index', compact('logs'));
    }

    public function show($id)
{
    $log = ActivityLog::findOrFail($id);
    return response()->json($log); // Return the log as JSON
}
}
