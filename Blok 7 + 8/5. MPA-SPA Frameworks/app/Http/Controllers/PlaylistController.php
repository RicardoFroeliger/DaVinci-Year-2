<?php

namespace App\Http\Controllers;

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
        $songs = Song::all();

        return view('playlist', ['songs' => $songs]);
    }
}
