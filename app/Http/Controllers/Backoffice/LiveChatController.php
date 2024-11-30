<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\LiveChat;
use Illuminate\Http\Request;

class LiveChatController extends Controller
{
    public function index()
{
    $liveChat = LiveChat::first(); // Get the first record (or null if none exists)
    return view('backend.live_chat.index', compact('liveChat'));
}

public function store(Request $request)
{
    $request->validate([
        'link_livechat' => 'nullable|url',
        'code_livechat' => 'nullable|string',
        'scripts_js_livechat' => 'nullable|string',
    ]);

    $liveChat = LiveChat::updateOrCreate(
        ['id' => 1], // We assume there is only one record for live chat settings
        $request->only(['link_livechat', 'code_livechat', 'scripts_js_livechat'])
    );

    return redirect()->route('backoffice.livechat.index')->with('success', 'Live chat settings saved successfully.');
}
}
