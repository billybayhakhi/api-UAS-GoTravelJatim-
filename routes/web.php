<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/destinations', [DestinationController::class, 'index']);

Route::get('/tours', function () {
    return view('touring');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/trip/{id}', function($id) {
    return view('trip.' . $id);
})->where('id', '[1-5]');

use App\Models\Tour;

Route::get('/booking/{id}', function($id) {
    $tour = Tour::findOrFail($id);
    return view('booking', compact('tour'));
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/profile', function () {
    return view('profile');
});