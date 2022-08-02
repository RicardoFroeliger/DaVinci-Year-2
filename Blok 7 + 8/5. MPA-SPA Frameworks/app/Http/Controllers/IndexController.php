<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $queue = SessionManager::getQueue();
        $playlists = Auth::user() ? Playlist::where('user_id', '=', Auth::user()->id)->get() : [];

        return view('index', [
            'genres' => $genres,
            'queue' => $queue,
            'playlists' => $playlists
        ]);
    }
}
