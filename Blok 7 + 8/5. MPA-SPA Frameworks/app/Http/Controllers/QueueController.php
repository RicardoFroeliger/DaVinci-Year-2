<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index(Request $request) {
        $queue = $request->session()->get('queue.songs');

        return view('queue', ['queue' => $queue]);
    }

    public function create() {
        return abort(404);
    }

    public function store(Request $request) {
        // $request->session()->put('queue.songs', []);

        $song = Song::where('id', '=', $request->all()['songId'])->get();

        $request->session()->push('queue.songs', $song);

        return redirect('/queue');
    }
}
