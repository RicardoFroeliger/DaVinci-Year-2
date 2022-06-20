<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $genres = Genre::all();
        $queue = $request->session()->get('queue', []);
        $playlists = Auth::user() ? Playlist::where('user_id', '=', Auth::user()->id)->get() : []; 

        return view('index', [
            'genres' => $genres, 
            'queue' => Song::find($queue),
            'playlists' => $playlists
        ]);
    }
}
