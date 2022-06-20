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
Route::get('/queue/store', abort(404));
Route::post('/queue/destroy', [App\Http\Controllers\QueueController::class, 'destroy']);
Route::get('/queue/destroy', abort(404));


Route::get('/playlists', [App\Http\Controllers\PlaylistController::class, 'index']);
Route::get('/playlist/{playlist}', [App\Http\Controllers\PlaylistController::class, 'show']);
Route::post('/playlist/store', [App\Http\Controllers\PlaylistController::class, 'store']);
Route::get('/playlist/store', abort(404));
Route::post('/playlist/destroy', [App\Http\Controllers\PlaylistController::class, 'destroy']);
Route::get('/playlist/destroy', abort(404));