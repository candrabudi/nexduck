<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SocialMediaController extends Controller
{
    public function index()
    {
        $socialMediaList = SocialMedia::paginate(10);
        return view('backend.social_media.index', compact('socialMediaList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'link_social_media' => 'required|url',
            'type' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $existingSocialMedia = SocialMedia::where('type', $request->type)->first();

        if ($existingSocialMedia) {
            return $this->update($request, $existingSocialMedia->id);
        } else {
            $socialMedia = new SocialMedia();
            $socialMedia->name = $request->name;
            $socialMedia->link_social_media = $request->link_social_media;
            $socialMedia->type = $request->type;

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('social_media_images', 'public');
                $socialMedia->image = asset(Storage::url($path));
            }

            $socialMedia->save();

            return response()->json(['success' => true]);
        }
    }

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
                $oldImage = str_replace('storage/', 'public/', $socialMedia->image);
                Storage::delete($oldImage);
            }
            $path = $request->file('image')->store('social_media_images', 'public');
            $socialMedia->image = asset(Storage::url($path));
        }

        $socialMedia->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);

        if ($socialMedia->image) {
            $oldImage = str_replace('storage/', 'public/', $socialMedia->image);
            Storage::delete($oldImage);
        }

        $socialMedia->delete();

        return response()->json(['success' => true]);
    }
}
