<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $playlists = Playlist::all();

        return view('playlists', ['playlists' => $playlists]);
    }

    public function show(Playlist $playlist)
    {
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
