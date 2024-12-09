<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    // List all banners
    public function index()
    {
        $banners = Banner::all();
        return view('backend.banners.index', compact('banners'));
    }

    // Store a new banner
    public function store(Request $request)
    {
        $request->validate([
            'banner_name' => 'required',
            'banner_image' => 'required|image',
            'banner_status' => 'required|integer',
        ]);

        $imagePath = $request->file('banner_image')->store('banners', 'public');
        $imageUrl = asset(Storage::url($imagePath));

        Banner::create([
            'banner_name' => $request->banner_name,
            'banner_image' => $imageUrl, 
            'banner_status' => $request->banner_status,
            'created_by' => Auth::id(),
            'created_ip_address' => $request->ip(),
        ]);

        return redirect()->back()->with('success', 'Banner created successfully.');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'banner_name' => 'required',
            'banner_image' => 'nullable|image',
            'banner_status' => 'required|integer',
        ]);

        if ($request->hasFile('banner_image')) {
            $imagePath = $request->file('banner_image')->store('banners', 'public');
            $imageUrl = asset(Storage::url($imagePath));
            $banner->banner_image = $imageUrl;
        }

        $banner->update([
            'banner_name' => $request->banner_name,
            'banner_status' => $request->banner_status,
            'updated_by' => Auth::id(),
            'updated_ip_address' => $request->ip(),
        ]);

        return redirect()->back()->with('success', 'Banner updated successfully.');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->back()->with('success', 'Banner deleted successfully.');
    }
}
