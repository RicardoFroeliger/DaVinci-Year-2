<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

class Playlist_SongController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Song $song)
    {
        $playlistId = intval(sanitize(request('songAddPlaylistsSelect')));
        $playlist = Playlist::where('id', $playlistId)->with('songs')->first();
        
        if($playlist) {
            $playlist->songs()->attach($song);

            $playlist = Playlist::where('id', $playlistId)->with('songs')->first();
    
            $totalDuration = 0;
            foreach ($playlist->songs as $song) $totalDuration += $song->duration;

            $playlist->total_duration = $totalDuration;
            $playlist->save();

            return redirect('/playlist/'.$playlist->id);
        }

        return redirect('/playlists');
    }

    public function destroy(Song $song)
    {
        $playlistId = intval(sanitize(request('songRemovePlaylistsSelect')));
        $playlist = Playlist::where('id', $playlistId)->with('songs')->first();
        
        if($playlist) {
            $playlist->songs()->detach($song);

            $playlist = Playlist::where('id', $playlistId)->with('songs')->first();
    
            $totalDuration = 0;
            foreach ($playlist->songs as $song) $totalDuration += $song->duration;

            $playlist->total_duration = $totalDuration;
            $playlist->save();

            return redirect('/playlist/'.$playlist->id);
        }

        return redirect('/playlists');
    }
}
