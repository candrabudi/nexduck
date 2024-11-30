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
        // Retrieve the first setting record from the database
        $setting = Setting::first();
        
        // Return the view with the setting data
        return view('backend.settings.index', compact('setting'));
    }

    public function storeOrUpdate(Request $request)
    {
        // return $request;
        // Validate the incoming request data
        $request->validate([
            'web_name' => 'required|string|max:255',
            'web_icon' => 'nullable|mimes:webp,ico,jpg,jpeg,png|max:10240',
            'web_logo' => 'nullable|mimes:webp,ico,jpg,jpeg,png|max:10240',
            'web_description' => 'required|string|max:500',
            'web_token' => 'required|string|max:255',
            'web_maintenance' => 'nullable|boolean',
            'web_running_text' => 'nullable|string|max:255',
        ]);

        // Check if the setting record already exists
        $setting = Setting::first();

        if ($setting) {
            // Update the setting if it exists
            $setting->web_name = $request->web_name;
            $setting->web_description = $request->web_description;
            $setting->web_token = $request->web_token;
            $setting->web_maintenance = $request->web_maintenance ?? 0;
            $setting->web_running_text = $request->web_running_text ??  null;

            // Handle file upload for web_icon
            if ($request->hasFile('web_icon')) {
                // Store the new web_icon and update the URL in the setting
                $iconPath = $request->file('web_icon')->storeAs('public/web_icons', uniqid() . '.' . $request->file('web_icon')->getClientOriginalExtension());
                $setting->web_icon = asset(Storage::url($iconPath));
            }

            // Handle file upload for web_logo
            if ($request->hasFile('web_logo')) {
                // Store the new web_logo and update the URL in the setting
                $logoPath = $request->file('web_logo')->storeAs('public/web_logos', uniqid() . '.' . $request->file('web_logo')->getClientOriginalExtension());
                $setting->web_logo = asset(Storage::url($logoPath));
            }

            // Save the updated settings
            $setting->save();
        } else {
            // If no settings exist, create a new setting record
            $setting = Setting::create([
                'web_name' => $request->web_name,
                'web_description' => $request->web_description,
                'web_token' => $request->web_token,
                'web_maintenance' => $request->web_maintenance ?? 0,
                'web_running_text' => $request->web_running_text ?? null,
            ]);

            // Handle file upload for web_icon
            if ($request->hasFile('web_icon')) {
                // Store the web_icon and update the URL in the setting
                $iconPath = $request->file('web_icon')->storeAs('public/web_icons', uniqid() . '.' . $request->file('web_icon')->getClientOriginalExtension());
                $setting->web_icon = asset(Storage::url($iconPath));
            }

            // Handle file upload for web_logo
            if ($request->hasFile('web_logo')) {
                // Store the web_logo and update the URL in the setting
                $logoPath = $request->file('web_logo')->storeAs('public/web_logos', uniqid() . '.' . $request->file('web_logo')->getClientOriginalExtension());
                $setting->web_logo = asset(Storage::url($logoPath));
            }

            // Save the new setting
            $setting->save();
        }

        // Redirect back to the settings page with a success message
        return redirect()->route('backoffice.settings.index')->with('success', 'Website settings updated successfully!');
    }
}
