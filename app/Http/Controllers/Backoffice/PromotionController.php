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
        // Fetch promotions with their related details
        $promotions = Promotion::with('details')->get();

        // Pass the promotions to the view
        return view('backend.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('backend.promotions.form');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'short_desc' => 'required|string',
            'content' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'promotion_type' => 'required|in:winover,turnover,post',
            'provider_category' => 'nullable|in:slot,casino',
            'bonus_type' => 'nullable|in:daily,old,new',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'min_deposit' => 'required|integer',
            'max_deposit' => 'required|integer',
            'max_withdraw' => 'required|integer',
            'turn_over' => 'required|integer',
            'percentage_bonus' => 'required|integer',
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

        $promotion = Promotion::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_desc' => $request->short_desc,
            'content' => $request->content,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'promotion_type' => $request->promotion_type,
            'provider_category' => $request->provider_category,
            'bonus_type' => $request->bonus_type,
            'status' => 'active',
            'thumbnail' => $thumbnailPath,
        ]);

        PromotionDetail::create([
            'promotion_id' => $promotion->id,
            'min_deposit' => $request->min_deposit,
            'max_deposit' => $request->max_deposit,
            'max_withdraw' => $request->max_withdraw,
            'turn_over' => $request->turn_over,
            'percentage_bonus' => $request->percentage_bonus,
        ]);

        return redirect()->route('promotions.index')->with('success', 'Promotion created successfully!');
    }

    public function edit(Request $request)
    {
        $promotionId = $request->query('id');
        $promotion = Promotion::with('details')->find($promotionId);

        if (!$promotion) {
            return redirect()->back()->with('error', 'Promotion not found');
        }

        return view('backend.promotions.edit', compact('promotion'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'short_desc' => 'required',
            'content' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'promotion_type' => 'required',
            'provider_category' => 'nullable',
            'bonus_type' => 'nullable',
            'thumbnail' => 'nullable|image',
            'min_deposit' => 'required|integer',
            'max_deposit' => 'required|integer',
            'max_withdraw' => 'required|integer',
            'turn_over' => 'required|integer',
            'percentage_bonus' => 'required|integer',
        ]);

        $promotionId = $request->query('id');
        $promotion = Promotion::find($promotionId);

        if (!$promotion) {
            return redirect()->back()->with('error', 'Promotion not found');
        }

        $promotion->update($request->only([
            'title', 'slug', 'short_desc', 'content', 'start_date', 'end_date',
            'promotion_type', 'provider_category', 'bonus_type', 'status', 'thumbnail'
        ]));

        if ($promotion->details()->exists()) {
            $promotion->details()->update($request->only([
                'min_deposit', 'max_deposit', 'max_withdraw', 'turn_over', 'percentage_bonus'
            ]));
        }

        return redirect()->route('backoffice.promotions')
                         ->with('success', 'Promotion updated successfully.');
    }
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        if ($promotion->thumbnail) {
            $oldPath = str_replace('/storage/', '', $promotion->thumbnail);
            Storage::disk('public')->delete($oldPath);
        }

        $promotion->delete();
        return redirect()->route('backoffice.promotions')->with('success', 'Promotion deleted successfully!');
    }

}
