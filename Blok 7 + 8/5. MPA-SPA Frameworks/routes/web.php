<?php

use Illuminate\Support\Facades\Route;

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
    return view('template');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/genres', [App\Http\Controllers\GenreController::class, 'index']);

Route::get('/genre/{genre}', [App\Http\Controllers\GenreController::class, 'show']);

Route::get('/song/{song}', [App\Http\Controllers\SongController::class, 'show']);

Route::get('/playlist', [App\Http\Controllers\PlaylistController::class, 'index']); // not logged in

// Route::get('/playlists', [App\Http\Controllers\PlaylistController::class, 'index']); // logged in

// Route::get('/playlist/{playlist}', [App\Http\Controllers\PlaylistController::class, 'show']); // logged in