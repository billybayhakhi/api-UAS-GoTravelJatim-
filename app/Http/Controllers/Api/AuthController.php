<?php
// app/Http/Controllers/Api/AuthController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // ── REGISTER ─────────────────────────────────────
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password, // auto hashed by cast
        ]);

        $token = auth('api')->login($user);

        return response()->json([
            'success' => true,
            'message' => 'Registrasi berhasil',
            'data'    => [
                'user'  => $user,
                'token' => $token,
                'type'  => 'bearer',
            ],
        ], 201);
    }

    // ── LOGIN ─────────────────────────────────────────
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah',
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    // ── PROFILE (butuh token) ────────────────────────
    public function me()
    {
        $user = auth('api')->user()->load('bookings.tour');
        return response()->json([
            'success' => true,
            'data'    => $user,
        ]);
    }

    // ── LOGOUT ───────────────────────────────────────
    public function logout()
    {
        auth('api')->logout();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil logout',
        ]);
    }

    // ── REFRESH TOKEN ────────────────────────────────
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    // ── HELPER ───────────────────────────────────────
    private function respondWithToken(string $token)
    {
        return response()->json([
            'success' => true,
            'data'    => [
                'user'       => auth('api')->user(),
                'token'      => $token,
                'type'       => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60 . ' detik',
            ],
        ]);
    }
}