<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    public function show(Song $song)
    {
        $queueIds = SessionManager::getQueueIds();

        $inPlaylists = Auth::user() ? Song::where('id', $song->id)->with('playlists')->first()->playlists()
            ->where('user_id', Auth::user()->id)->get() : [];

        $notInPlaylists = Auth::user() ? Playlist::whereNotIn('id', array_map(fn ($x) => $x->id, [...$inPlaylists]))
            ->where('user_id', Auth::user()->id)->get() : [];

        return view('song', [
            'song' => $song,
            'queueIds' => $queueIds,
            'inPlaylists' => $inPlaylists,
            'notInPlaylists' => $notInPlaylists
        ]);
    }
}
