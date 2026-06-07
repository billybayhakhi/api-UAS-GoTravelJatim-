<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'check_in' => 'required|date|after_or_equal:today',
            'jumlah_orang' => 'required|integer|min:1',
            'catatan' => 'nullable|string'
        ]);

        $tour = Tour::findOrFail($request->tour_id);

        // Validasi jumlah orang tidak melebihi kapasitas paket
        if ($request->jumlah_orang > $tour->max_people) {
            return response()->json([
                'success' => false,
                'message' => "Jumlah orang melebihi kapasitas paket ini (maks {$tour->max_people} orang)."
            ], 422);
        }

        $total_harga = $tour->price * $request->jumlah_orang;

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'tour_id' => $tour->id,
            'booking_code' => 'TRX-' . strtoupper(Str::random(8)),
            'check_in' => $request->check_in,
            'jumlah_orang' => $request->jumlah_orang,
            'total_harga' => $total_harga,
            'status' => 'pending',
            'catatan' => $request->catatan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pemesanan berhasil dibuat',
            'data' => $booking
        ], 201);
    }
}
