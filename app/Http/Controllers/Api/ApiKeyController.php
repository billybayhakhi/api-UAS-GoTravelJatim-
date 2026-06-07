<?php
// app/Http/Controllers/Api/ApiKeyController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApiKey;
use Illuminate\Http\Request;

class ApiKeyController extends Controller
{
    // Lihat semua API key milik user
    public function index()
    {
        $keys = auth('api')->user()->apiKeys()->latest()->get();

        return response()->json([
            'success' => true,
            'data'    => $keys,
        ]);
    }

    // Buat API key baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $apiKey = ApiKey::create([
            'user_id' => auth('api')->id(),
            'name'    => $request->name,
            'key'     => ApiKey::generate(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'API key berhasil dibuat. Simpan key ini, tidak akan ditampilkan lagi!',
            'data'    => $apiKey,
        ], 201);
    }

    // Nonaktifkan API key
    public function destroy($id)
    {
        $apiKey = auth('api')->user()->apiKeys()->findOrFail($id);
        $apiKey->update(['is_active' => false]);

        return response()->json([
            'success' => true,
            'message' => 'API key dinonaktifkan',
        ]);
    }
}