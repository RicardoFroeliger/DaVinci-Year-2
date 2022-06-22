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
        function sanitize($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $playlistName = sanitize(request('name'));
        if(empty($playlistName)) return redirect('/queue');
        
        $queue = $request->session()->get('queue', []);
        $queue = Song::whereIn('id', $queue)->get();

        $totalDuration = 0;
        foreach ($queue as $song) $totalDuration += $song->duration;

        $playlist = new Playlist();
        $playlist->user_id = Auth::user()->id;
        $playlist->name = $playlistName;
        $playlist->total_duration = $totalDuration;
        $playlist->save();

        $playlist->song()->attach($queue);

        $request->session()->forget('queue');
        return redirect('/playlists');
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->song()->detach($playlist->song);
        $playlist->delete();

        return redirect('/playlists');
    }
}
