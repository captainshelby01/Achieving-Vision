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

Route::get('/sitemap.xml', function () {
    $posts = Post::published()->orderBy('published_at', 'desc')->get();
    
    $staticUrls = [
        ['loc' => route('home'), 'priority' => '1.0', 'changefreq' => 'daily'],
        ['loc' => route('blog.index'), 'priority' => '0.9', 'changefreq' => 'daily'],
        ['loc' => route('about'), 'priority' => '0.8', 'changefreq' => 'weekly'],
        ['loc' => route('events'), 'priority' => '0.8', 'changefreq' => 'weekly'],
        ['loc' => route('newsletter'), 'priority' => '0.7', 'changefreq' => 'monthly'],
        ['loc' => route('contact'), 'priority' => '0.6', 'changefreq' => 'monthly'],
        ['loc' => route('privacy'), 'priority' => '0.3', 'changefreq' => 'yearly'],
        ['loc' => route('terms'), 'priority' => '0.3', 'changefreq' => 'yearly'],
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    
    foreach ($staticUrls as $url) {
        $xml .= '<url>';
        $xml .= '<loc>' . htmlspecialchars($url['loc']) . '</loc>';
        $xml .= '<changefreq>' . $url['changefreq'] . '</changefreq>';
        $xml .= '<priority>' . $url['priority'] . '</priority>';
        $xml .= '</url>';
    }

    foreach ($posts as $post) {
        $xml .= '<url>';
        $xml .= '<loc>' . htmlspecialchars(route('blog.show', $post->slug)) . '</loc>';
        $xml .= '<lastmod>' . $post->updated_at->toAtomString() . '</lastmod>';
        $xml .= '<changefreq>weekly</changefreq>';
        $xml .= '<priority>0.8</priority>';
        $xml .= '</url>';
    }

    $xml .= '</urlset>';

    return response($xml, 200, [
        'Content-Type' => 'application/xml',
    ]);
})->name('sitemap');
