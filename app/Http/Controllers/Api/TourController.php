<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourController extends Controller
{
    // [R] READ ALL — Tampilkan semua paket tour
    public function index()
    {
        $tours = Tour::with(['category', 'destinations'])->get();

        return response()->json([
            'success' => true,
            'data'    => $tours,
        ], 200);
    }

    // [C] CREATE — Tambah paket tour baru
    public function store(Request $request)
    {
        $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'duration_days' => 'required|integer|min:1',
            'max_people'    => 'required|integer|min:1',
            'price'         => 'required|numeric|min:0',
            'image'         => 'nullable|string',
            'is_active'     => 'nullable|boolean',
        ]);

        $tour = Tour::create([
            'category_id'   => $request->category_id,
            'title'         => $request->title,
            'slug'          => Str::slug($request->title),
            'description'   => $request->description,
            'duration_days' => $request->duration_days,
            'max_people'    => $request->max_people,
            'price'         => $request->price,
            'rating'        => 0,
            'image'         => $request->image,
            'is_active'     => $request->is_active ?? true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Paket tour berhasil ditambahkan',
            'data'    => $tour->load('category'),
        ], 201);
    }

    // [R] READ DETAIL — Tampilkan detail 1 tour berdasarkan ID
    public function show($id)
    {
        $tour = Tour::with(['category', 'destinations'])->find($id);

        if (!$tour) {
            return response()->json([
                'success' => false,
                'message' => 'Paket tour tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $tour,
        ], 200);
    }

    // [U] UPDATE — Ubah data tour
    public function update(Request $request, $id)
    {
        $tour = Tour::find($id);

        if (!$tour) {
            return response()->json([
                'success' => false,
                'message' => 'Paket tour tidak ditemukan',
            ], 404);
        }

        $input = $request->only([
            'category_id', 'title', 'description',
            'duration_days', 'max_people', 'price', 'image', 'is_active',
        ]);

        // Jika title diubah, slug ikut diperbarui otomatis
        if ($request->has('title')) {
            $input['slug'] = Str::slug($request->title);
        }

        $tour->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Paket tour berhasil diperbarui',
            'data'    => $tour->load('category'),
        ], 200);
    }

    // [D] DELETE — Hapus tour
    public function destroy($id)
    {
        $tour = Tour::find($id);

        if (!$tour) {
            return response()->json([
                'success' => false,
                'message' => 'Paket tour tidak ditemukan',
            ], 404);
        }

        $tour->delete();

        return response()->json([
            'success' => true,
            'message' => 'Paket tour berhasil dihapus',
        ], 200);
    }
}