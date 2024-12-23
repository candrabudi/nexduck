<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index($id = null)
    {
        $banners = Banner::all();
        $banner = null;

        if ($id) {
            $banner = Banner::findOrFail($id);
        }

        return view('backend.banners.index', compact('banners', 'banner'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner_name' => 'required|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_status' => 'required|integer',
        ]);

        $path = $request->file('banner_image')->store('banners', 'public');

        Banner::create([
            'banner_name' => $request->banner_name,
            'banner_image' => $path,
            'banner_status' => $request->banner_status,
            'created_by' => auth()->id(),
            'created_ip_address' => $request->ip(),
        ]);

        return redirect()->route('backoffice.banners')->with('success', 'Banner created successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'banner_name' => 'required|string|max:255',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_status' => 'required|integer',
        ]);

        $banner = Banner::findOrFail($id);
        $path = $banner->banner_image;

        if ($request->hasFile('banner_image')) {
            // Delete old image and store new one
            Storage::disk('public')->delete($banner->banner_image);
            $path = $request->file('banner_image')->store('banners', 'public');
        }

        $banner->update([
            'banner_name' => $request->banner_name,
            'banner_image' => $path,
            'banner_status' => $request->banner_status,
            'updated_by' => auth()->id(),
            'updated_ip_address' => $request->ip(),
        ]);

        return redirect()->route('backoffice.banners')->with('success', 'Banner updated successfully!');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        Storage::disk('public')->delete($banner->banner_image);
        $banner->delete();

        return redirect()->route('backoffice.banners')->with('success', 'Banner deleted successfully!');
    }
}