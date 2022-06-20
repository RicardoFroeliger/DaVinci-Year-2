<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $playlists = Auth::user() ? Playlist::where('user_id', '=', Auth::user()->id)->get() : []; 

        return view('playlists', ['playlists' => $playlists]);
    }

    public function show(Playlist $playlist)
    {
        if($playlist->user_id != Auth::user()->id) abort(403);

        $songs = $playlist->song;

        return view('playlist', ['playlist' => $playlist, 'songs' => $songs]);
    }

    public function store(Request $request)
    {
        $queue = $request->session()->get('queue', []);
        $queue = Song::whereIn('id', $queue)->get();

        $totalDuration = 0;
        foreach ($queue as $song) $totalDuration += $song->duration;

        $playlist = new Playlist();
        $playlist->user_id = Auth::user()->id;
        $playlist->name = 'test';
        $playlist->total_duration = $totalDuration;
        $playlist->save();

        $playlist->song()->attach($queue);

        return redirect('/playlists');
    }

    public function destroy()
    {

    }
}
