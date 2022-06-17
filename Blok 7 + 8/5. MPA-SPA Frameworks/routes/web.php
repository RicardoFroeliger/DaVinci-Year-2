<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);
Route::get('/home', [App\Http\Controllers\IndexController::class, 'index']);


Auth::routes();


Route::get('/genres', [App\Http\Controllers\GenreController::class, 'index']);
Route::get('/genre/{genre}', [App\Http\Controllers\GenreController::class, 'show']);


Route::get('/song/{song}', [App\Http\Controllers\SongController::class, 'show']);


Route::get('/queue', [App\Http\Controllers\QueueController::class, 'index']);
Route::post('/queue/store', [App\Http\Controllers\QueueController::class, 'store']);
Route::get('/queue/store', [App\Http\Controllers\QueueController::class, 'create']);
Route::post('/queue/remove', [App\Http\Controllers\QueueController::class, 'remove']);
Route::get('/queue/remove', [App\Http\Controllers\QueueController::class, 'create']);


Route::get('/playlist', [App\Http\Controllers\PlaylistController::class, 'index']); // not logged in
// Route::get('/playlists', [App\Http\Controllers\PlaylistController::class, 'index']); // logged in
// Route::get('/playlist/{playlist}', [App\Http\Controllers\PlaylistController::class, 'show']); // logged in