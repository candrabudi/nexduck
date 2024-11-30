<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SocialMediaController extends Controller
{
    // Show all social media data with pagination
    public function index()
    {
        $socialMediaList = SocialMedia::paginate(10); // Paginate 10 per page
        return view('backend.social_media.index', compact('socialMediaList'));
    }

    // Store or update the social media record based on the type
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'link_social_media' => 'required|url',
            'type' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Check if the type already exists in the database
        $existingSocialMedia = SocialMedia::where('type', $request->type)->first();

        if ($existingSocialMedia) {
            // If the type already exists, update the existing record
            return $this->update($request, $existingSocialMedia->id);
        } else {
            // If the type doesn't exist, create a new record
            $socialMedia = new SocialMedia();
            $socialMedia->name = $request->name;
            $socialMedia->link_social_media = $request->link_social_media;
            $socialMedia->type = $request->type;

            if ($request->hasFile('image')) {
                // Store the image in the 'public/social_media_images' folder
                $path = $request->file('image')->store('social_media_images', 'public');
                $socialMedia->image = asset(Storage::url($path));
            }

            $socialMedia->save();

            return response()->json(['success' => true]);
        }
    }

    // Update an existing social media record
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'link_social_media' => 'required|url',
            'type' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->name = $request->name;
        $socialMedia->link_social_media = $request->link_social_media;
        $socialMedia->type = $request->type;

        if ($request->hasFile('image')) {
            if ($socialMedia->image) {
                // Delete the old image if it exists
                $oldImage = str_replace('storage/', 'public/', $socialMedia->image);
                Storage::delete($oldImage);
            }
            // Store the new image in the 'public/social_media_images' folder
            $path = $request->file('image')->store('social_media_images', 'public');
            $socialMedia->image = asset(Storage::url($path));  // This will generate the URL
        }

        $socialMedia->save();

        return response()->json(['success' => true]);
    }

    // Delete a social media record
    public function destroy($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);

        if ($socialMedia->image) {
            // Delete the image from storage
            $oldImage = str_replace('storage/', 'public/', $socialMedia->image);
            Storage::delete($oldImage);
        }

        $socialMedia->delete();

        return response()->json(['success' => true]);
    }
}
