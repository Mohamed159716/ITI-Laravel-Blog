<?php

use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get("/posts", [PostController::class, 'index'])->name('posts.index');
    Route::get("/posts/create", [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{postId}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{postId}/edit', [PostController::class, 'edit'])->name('posts.edit');

    Route::delete('/posts/{postId}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post("/posts", [PostController::class, 'store'])->name('posts.store');
    Route::put("/posts/{postId}", [PostController::class, 'update'])->name("posts.update");


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});



Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('github.login');

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = User::where('email', $githubUser->email)->first();

    if (!$user) {
        $user =  User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'password' => $githubUser->token
        ]);
    }

    Auth::login($user);
    return redirect('/posts');
});

Route::get('/auth/login', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('/auth/callback/google', function () {
    $googleUser = Socialite::driver('google')->user();

    $user = User::where('email', $googleUser->email)->first();

    if (!$user) {
        $user =  User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => $googleUser->token
        ]);
    }

    Auth::login($user);
    return redirect('/posts');
});