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
        $promotion = new Promotion();
        $promotion->title = $request->title;
        $promotion->slug = Str::slug($request->title);
        $promotion->short_desc = $request->short_desc;
        $promotion->desc = $request->desc;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->type = $request->type;
        $promotion->status = $request->promotion_status;
        $promotion->is_claim = $request->is_claim;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('promotions', 'public');
            $promotion->image = asset(Storage::url($path)); // Simpan URL publik
        }
        $promotion->save();

        if($request->is_claim == 1) {
            $promotionDetail = new PromotionDetail();
            $promotionDetail->promotion_id = $promotion->id;
            $promotionDetail->min_deposit = $request->min_deposit;
            $promotionDetail->max_deposit = $request->max_deposit;
            $promotionDetail->max_withdraw = $request->max_withdraw;
            $promotionDetail->target = $request->target;
            $promotionDetail->percentage = $request->percentage;
        }

        return redirect()->route('backoffice.promotions')->with('success', 'Promotion created successfully!');
    }

    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('backend.promotions.form', compact('promotion'));
    }

    public function update(Request $request, $id)
    {

        // Cari promotion yang akan diperbarui
        $promotion = Promotion::findOrFail($id);
        $promotion->title = $request->name;
        $promotion->slug = Str::slug($request->name);
        $promotion->short_dec = $request->description;
        $promotion->description = $request->description;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->type = $request->type;
        $promotion->status = $request->promotion_status;

        // Proses gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($promotion->image) {
                $oldPath = str_replace('/storage/', '', $promotion->image);
                Storage::disk('public')->delete($oldPath);
            }

            // Simpan gambar baru
            $path = $request->file('image')->store('promotions', 'public');
            $promotion->image = asset(Storage::url($path)); // Simpan URL publik
        }

        // Simpan perubahan ke database
        $promotion->save();

        return redirect()->route('backoffice.promotions')->with('success', 'Promotion updated successfully!');
    }

    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($promotion->image) {
            $oldPath = str_replace('/storage/', '', $promotion->image);
            Storage::disk('public')->delete($oldPath);
        }

        $promotion->delete();
        return redirect()->route('backoffice.promotions')->with('success', 'Promotion deleted successfully!');
    }
}
