<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;

class TourController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data'    => Destination::all(),
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'success' => true,
            'data'    => Destination::findOrFail($id),
        ]);
    }
}