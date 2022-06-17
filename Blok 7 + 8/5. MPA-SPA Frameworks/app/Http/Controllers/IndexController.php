<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $genres = Genre::all();
        $queue = $request->session()->get('queue', []);

        return view('index', ['genres' => $genres, 'queue' => Song::find($queue)]);
    }
}
