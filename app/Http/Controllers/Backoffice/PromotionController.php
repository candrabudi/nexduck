<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Promotion;
use App\Models\PromotionDetail;
use Illuminate\Support\Str;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('backend.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('backend.promotions.form');
    }

    public function store(Request $request)
    {
        // Validating input fields
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string',
            'content' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'promotion_type' => 'required|in:winover,turnover,post',
            'status' => 'required|in:active,inactive',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $promotion = new Promotion();
        $promotion->title = $request->title;
        $promotion->slug = Str::slug($request->title);
        $promotion->short_desc = $request->short_desc;
        $promotion->content = $request->content;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->promotion_type = $request->promotion_type;
        $promotion->provider_category = $request->provider_category;
        $promotion->bonus_type = $request->bonus_type;
        $promotion->status = $request->status;

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('promotions', 'public');
            $promotion->thumbnail = asset(Storage::url($path));
        }

        $promotion->save();

        return redirect()->route('backoffice.promotions')->with('success', 'Promotion created successfully!');
    }

    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('backend.promotions.form', compact('promotion'));
    }

    public function update(Request $request, $id)
    {
        // Validating input fields
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_desc' => 'required|string',
            'content' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'promotion_type' => 'required|in:winover,turnover,post',
            'status' => 'required|in:active,inactive',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $promotion = Promotion::findOrFail($id);
        $promotion->title = $request->title;
        $promotion->slug = Str::slug($request->title);
        $promotion->short_desc = $request->short_desc;
        $promotion->content = $request->content; // updated to 'content'
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->promotion_type = $request->promotion_type; // updated to 'promotion_type'
        $promotion->status = $request->status;

        // Handle thumbnail upload if present
        if ($request->hasFile('thumbnail')) { // updated to 'thumbnail'
            // Delete the old thumbnail if it exists
            if ($promotion->thumbnail) {
                $oldPath = str_replace('/storage/', '', $promotion->thumbnail);
                Storage::disk('public')->delete($oldPath);
            }

            // Store the new thumbnail
            $path = $request->file('thumbnail')->store('promotions', 'public'); // updated to 'thumbnail'
            $promotion->thumbnail = asset(Storage::url($path)); // updated to 'thumbnail'
        }

        $promotion->save();

        return redirect()->route('backoffice.promotions')->with('success', 'Promotion updated successfully!');
    }

    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);

        // Delete the thumbnail if it exists
        if ($promotion->thumbnail) { // updated to 'thumbnail'
            $oldPath = str_replace('/storage/', '', $promotion->thumbnail);
            Storage::disk('public')->delete($oldPath);
        }

        $promotion->delete();
        return redirect()->route('backoffice.promotions')->with('success', 'Promotion deleted successfully!');
    }

}
