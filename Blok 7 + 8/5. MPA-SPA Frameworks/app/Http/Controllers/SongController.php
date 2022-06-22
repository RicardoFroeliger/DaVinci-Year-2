<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function show(Song $song, Request $request)
    {
        $queue = $request->session()->get('queue', []);

        $inPlaylists = Song::where('id', '=', $song->id)->with('playlists')->first()->playlists;

        $notInPlaylists = Playlist::whereNotIn('id', array_map(fn($x) => $x->id, [...$inPlaylists]))->get();

        return view('song', [
            'song' => $song, 
            'queue' => $queue,
            'inPlaylists' => $inPlaylists,
            'notInPlaylists' => $notInPlaylists
        ]);
    }
}
