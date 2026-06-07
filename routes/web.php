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
use App\Models\Blog;

Route::get('/booking/{id}', function($id) {
    $tour = Tour::findOrFail($id);
    return view('booking', compact('tour'));
});

// Blog routes
Route::get('/blog', function () {
    $blogs = Blog::with('destination')->where('is_published', true)->orderByDesc('published_at')->get();
    return view('blog', compact('blogs'));
});

Route::get('/blog/{slug}', function ($slug) {
    $blog = Blog::with(['author', 'destination'])->where('slug', $slug)->where('is_published', true)->firstOrFail();
    $related = Blog::where('id', '!=', $blog->id)->where('is_published', true)->latest()->take(3)->get();
    return view('blog-detail', compact('blog', 'related'));
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