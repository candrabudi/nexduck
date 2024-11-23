<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Promotion;

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

        // Buat instance baru Promotion
        $promotion = new Promotion();
        $promotion->name = $request->name;
        $promotion->description = $request->description;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->type = $request->type;
        $promotion->status = $request->promotion_status;

        // Proses gambar jika ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('promotions', 'public');
            $promotion->image = asset(Storage::url($path)); // Simpan URL publik
        }

        // Simpan ke database
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

        // Cari promotion yang akan diperbarui
        $promotion = Promotion::findOrFail($id);
        $promotion->name = $request->name;
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
