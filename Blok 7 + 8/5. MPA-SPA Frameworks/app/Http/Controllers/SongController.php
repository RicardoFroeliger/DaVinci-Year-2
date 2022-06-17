<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function show(Song $song, Request $request)
    {
        $queue = $request->session()->get('queue', []);

        return view('song', ['song' => $song, 'queue' => $queue]);
    }
}
