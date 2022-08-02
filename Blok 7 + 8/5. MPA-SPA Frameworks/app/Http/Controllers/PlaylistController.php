<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

class PlaylistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $playlists = Auth::user() ? Playlist::where('user_id', '=', Auth::user()->id)->get() : [];

        return view('playlists', [
            'playlists' => $playlists
        ]);
    }

    public function show(Playlist $playlist)
    {
        if ($playlist->user_id != Auth::user()->id) abort(403);

        $songs = $playlist->songs;

        return view('playlist', ['playlist' => $playlist, 'songs' => $songs]);
    }

    public function store()
    {
        $playlistName = sanitize(request('playlistName'));
        if (empty($playlistName) || strlen($playlistName) > 50) return redirect('/queue');

        $queueIds = SessionManager::getQueueIds();
        $queueDuration = SessionManager::getQueueDuration();

        $playlist = new Playlist();
        $playlist->user_id = Auth::user()->id;
        $playlist->name = $playlistName;
        $playlist->total_duration = $queueDuration;
        $playlist->save();

        $playlist->songs()->attach($queueIds);

        SessionManager::forgetQueue();
        return redirect('/playlist/' . $playlist->id);
    }

    public function update(Playlist $playlist)
    {
        $playlistName = sanitize(request('playlistName'));

        if (!empty($playlistName && strlen($playlistName) <= 50)) {
            $playlist->name = $playlistName;
            $playlist->save();
        }

        return redirect('/playlist/' . $playlist->id);
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->songs()->detach($playlist->songs);
        $playlist->delete();

        return redirect('/playlists');
    }
}
