<?php

use App\Models\Category;
use App\Models\Event;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $featuredPosts = Post::published()->with(['categories', 'author'])->orderBy('published_at', 'desc')->take(3)->get();
    $upcomingEvents = Event::upcoming()->take(2)->get();

    return view('home', compact('featuredPosts', 'upcomingEvents'));
})->name('home');

Route::get('/blog', function () {
    return view('blog.index');
})->name('blog.index');

Route::get('/blog/{slug}', function ($slug) {
    $post = Post::published()->where('slug', $slug)->firstOrFail();
    $relatedPosts = Post::published()->where('id', '!=', $post->id)->take(3)->get();

    return view('posts.show', compact('post', 'relatedPosts'));
})->name('blog.show');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/events', function () {
    $events = Event::upcoming()->get();
    return view('events', compact('events'));
})->name('events');

Route::get('/newsletter', function () {
    return view('newsletter');
})->name('newsletter');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');
