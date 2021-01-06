<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ArticlesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Simple work

Route::get('/simplework', function () {
    return view('simplework');
});

Route::get('/simplework/about-us', function () {
    return view('about-us', [
        'articles' => App\Models\Article::take(3)->latest()->get()
    ]);
});

Route::get('/simplework/contact', function () {
    return view('contact');
});

Route::get('/simplework/articles', [ArticlesController::class, 'index']);

Route::get('/simplework/articles/{articles}', [ArticlesController::class, 'show']);

// Other stuff

Route::get('/something', function () {
    return ['something' => 'something else'];
});

Route::get('/test', function() {
    $name = request('name');

    return view('test', ['name' => $name]);
});

Route::get('/posts/{post}', function ($post) {
    $posts = [
        'post-one' => 'Welcome to my first post!',
        'post-two' => 'This is my second post of many.'
    ];

    if(!isset($posts[$post]))
    {
        abort(404, 'Sorry, we couldn\'nt find that post for you');
    }

    return view('post', [
        'post' => $posts[$post] ?? 'Nothing here yet.'
    ]);
});

Route::get('/blogs/{blog}', [BlogsController::class, 'show']);
Route::get('/posts/{post}', [PostsController::class, 'show']);