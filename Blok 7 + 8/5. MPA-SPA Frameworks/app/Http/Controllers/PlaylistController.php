<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index(Request $request)
    {
        $songs = Song::all();
        
        $request->session()->put('key', 'value123');

        $value = $request->session()->get('key');

        return view('playlist', ['songs' => $songs, 'value' => $value]);
    }
}
