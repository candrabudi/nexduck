<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        
        return view('backend.settings.index', compact('setting'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'web_name' => 'required|string|max:255',
            'web_icon' => 'nullable|mimes:webp,ico,jpg,jpeg,png|max:10240',
            'web_logo' => 'nullable|mimes:webp,ico,jpg,jpeg,png|max:10240',
            'web_description' => 'required|string|max:500',
            'web_token' => 'required|string|max:255',
            'web_maintenance' => 'nullable|boolean',
            'web_running_text' => 'nullable|string|max:255',
        ]);

        $setting = Setting::first();

        if ($setting) {
            $setting->web_name = $request->web_name;
            $setting->web_description = $request->web_description;
            $setting->web_token = $request->web_token;
            $setting->web_maintenance = $request->web_maintenance ?? 0;
            $setting->web_running_text = $request->web_running_text ??  null;

            if ($request->hasFile('web_icon')) {
                $iconPath = $request->file('web_icon')->storeAs('public/web_icons', uniqid() . '.' . $request->file('web_icon')->getClientOriginalExtension());
                $setting->web_icon = asset(Storage::url($iconPath));
            }

            if ($request->hasFile('web_logo')) {
                $logoPath = $request->file('web_logo')->storeAs('public/web_logos', uniqid() . '.' . $request->file('web_logo')->getClientOriginalExtension());
                $setting->web_logo = asset(Storage::url($logoPath));
            }

            $setting->save();
        } else {
            $setting = Setting::create([
                'web_name' => $request->web_name,
                'web_description' => $request->web_description,
                'web_token' => $request->web_token,
                'web_maintenance' => $request->web_maintenance ?? 0,
                'web_running_text' => $request->web_running_text ?? null,
            ]);

            if ($request->hasFile('web_icon')) {
                $iconPath = $request->file('web_icon')->storeAs('public/web_icons', uniqid() . '.' . $request->file('web_icon')->getClientOriginalExtension());
                $setting->web_icon = asset(Storage::url($iconPath));
            }

            if ($request->hasFile('web_logo')) {
                $logoPath = $request->file('web_logo')->storeAs('public/web_logos', uniqid() . '.' . $request->file('web_logo')->getClientOriginalExtension());
                $setting->web_logo = asset(Storage::url($logoPath));
            }

            $setting->save();
        }

        return redirect()->route('backoffice.settings.index')->with('success', 'Website settings updated successfully!');
    }
}
