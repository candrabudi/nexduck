<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialMediaController extends Controller
{
    // Menampilkan data social media
    public function index()
    {
        $socialMedia = SocialMedia::all();
        return view('backend.socialmedia.index', compact('socialMedia'));
    }

    // Menambah data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'link_social_media' => 'required|url',
            'type' => 'required|in:instagram,youtube,twitter,telegram,facebook,tiktok',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('social_media_images', 'public');
        } else {
            $imagePath = null;
        }

        SocialMedia::create([
            'name' => $validated['name'],
            'link_social_media' => $validated['link_social_media'],
            'type' => $validated['type'],
            'image' => $imagePath,
        ]);

        return redirect()->route('social-media.index')->with('success', 'Social media created successfully.');
    }

    // Menampilkan data yang akan diedit berdasarkan ID
    public function edit($id)
    {
        $socialMedia = SocialMedia::where('id', $id)->firstOrFail();
        return response()->json($socialMedia); // Mengembalikan data dalam bentuk JSON
    }

    // Mengupdate data social media berdasarkan ID
    public function update(Request $request, $id)
    {
        $socialMedia = SocialMedia::where('id', $id)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'link_social_media' => 'required|url',
            'type' => 'required|in:instagram,youtube,twitter,telegram,facebook,tiktok',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($socialMedia->image) {
                Storage::disk('public')->delete($socialMedia->image);
            }
            $imagePath = $request->file('image')->store('social_media_images', 'public');
        } else {
            $imagePath = $socialMedia->image;
        }

        $socialMedia->update([
            'name' => $validated['name'],
            'link_social_media' => $validated['link_social_media'],
            'type' => $validated['type'],
            'image' => $imagePath,
        ]);

        return redirect()->route('social-media.index')->with('success', 'Social media updated successfully.');
    }

    // Menghapus data berdasarkan ID
    public function destroy($id)
    {
        $socialMedia = SocialMedia::where('id', $id)->firstOrFail();

        if ($socialMedia->image) {
            Storage::disk('public')->delete($socialMedia->image);
        }

        $socialMedia->delete();

        return redirect()->route('social-media.index')->with('success', 'Social media deleted successfully.');
    }
}
