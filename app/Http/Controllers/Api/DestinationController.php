<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Wajib ditambahin untuk handle slug otomatis

class DestinationController extends Controller
{
    // [R] - READ ALL (Tampilkan Semua)
    public function index()
    {
        $destinations = Destination::all();
        return response()->json([
            'success' => true,
            'data' => $destinations
        ], 200);
    }

    // [C] - CREATE (Tambah Data Baru)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kabupaten' => 'required|string',
            'provinsi' => 'required|string',
            'description' => 'required',
            'image' => 'nullable|string' // Diisi string nama file atau URL dulu untuk testing API
        ]);

        $input = $request->all();
        // Otomatis membuat slug dari name, misal: "Pantai Kuta" jadi "pantai-kuta"
        $input['slug'] = Str::slug($request->name); 

        $destination = Destination::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Destinasi berhasil ditambahkan',
            'data' => $destination
        ], 201);
    }

    // [R] - READ DETAIL (Tampilkan 1 Data Berdasarkan ID)
    public function show($id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $destination
        ], 200);
    }

    // [U] - UPDATE (Ubah Data)
    public function update(Request $request, $id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $input = $request->all();
        // Jika namanya ikutan diubah, slug-nya otomatis diperbarui
        if ($request->has('name')) {
            $input['slug'] = Str::slug($request->name);
        }

        $destination->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Destinasi berhasil diperbarui',
            'data' => $destination
        ], 200);
    }

    // [D] - DELETE (Hapus Data)
    public function destroy($id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $destination->delete();

        return response()->json([
            'success' => true,
            'message' => 'Destinasi berhasil dihapus'
        ], 200);
    }
}