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
        // Get the first record of settings (if exists)
        $setting = Setting::first();

        // Pass the setting to the view
        return view('backend.settings.index', compact('setting'));
    }

    public function storeOrUpdate(Request $request)
    {
        // Validasi data yang dikirimkan
        $request->validate([
            'web_name' => 'required|string|max:255',
            'web_icon' => 'nullable|mimes:webp,ico,jpg,jpeg,png|max:10240',
            'web_logo' => 'nullable|mimes:webp,ico,jpg,jpeg,png|max:10240',
            'web_description' => 'required|string|max:500',
            'web_token' => 'required|string|max:255',
            'web_maintenance' => 'nullable|string|max:1',
            'web_running_text' => 'nullable|string|max:255',
        ]);

        // Periksa apakah pengaturan sudah ada atau belum
        $setting = Setting::first();

        if ($setting) {
            // Update pengaturan jika ada
            $setting->web_name = $request->web_name;
            $setting->web_description = $request->web_description;
            $setting->web_token = $request->web_token;
            $setting->web_maintenance = $request->web_maintenance;
            $setting->web_running_text = $request->web_running_text;

            // Handle file upload for web_icon and web_logo
            if ($request->hasFile('web_icon')) {
                $iconPath = $request->file('web_icon')->storeAs('public/web_icons', uniqid() . '.' . $request->file('web_icon')->getClientOriginalExtension());
                $setting->web_icon = Storage::url($iconPath);
            }

            if ($request->hasFile('web_logo')) {
                $logoPath = $request->file('web_logo')->storeAs('public/web_logos', uniqid() . '.' . $request->file('web_logo')->getClientOriginalExtension());
                $setting->web_logo = Storage::url($logoPath);
            }

            $setting->save();
        } else {
            // Jika tidak ada pengaturan, buat pengaturan baru
            $setting = Setting::create([
                'web_name' => $request->web_name,
                'web_description' => $request->web_description,
                'web_token' => $request->web_token,
                'web_maintenance' => $request->web_maintenance,
                'web_running_text' => $request->web_running_text,
            ]);

            // Handle file upload for web_icon and web_logo
            if ($request->hasFile('web_icon')) {
                $iconPath = $request->file('web_icon')->storeAs('public/web_icons', uniqid() . '.' . $request->file('web_icon')->getClientOriginalExtension());
                $setting->web_icon = Storage::url($iconPath);
            }

            if ($request->hasFile('web_logo')) {
                $logoPath = $request->file('web_logo')->storeAs('public/web_logos', uniqid() . '.' . $request->file('web_logo')->getClientOriginalExtension());
                $setting->web_logo = Storage::url($logoPath);
            }

            $setting->save();
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->route('backoffice.settings.index')->with('success', 'Website settings updated successfully!');
    }
}
