<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $genres = Genre::all();
        $queue = $request->session()->get('queue.songs');

        return view('index', ['genres' => $genres, 'queue' => $queue]);
    }
}
