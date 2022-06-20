<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index(Request $request)
    {
        $queue = $request->session()->get('queue', []);
        $queue = Song::whereIn('id', $queue)->get();

        $totalDuration = 0;
        foreach ($queue as $song) $totalDuration += $song->duration;

        return view('queue', ['queue' => $queue, 'totalDuration' => $totalDuration]);
    }

    public function store(Request $request)
    {
        $songId = $request->all()['songId'];

        $request->session()->push('queue', $songId);

        return redirect('/queue');
    }

    public function destroy(Request $request)
    {
        $songId = $request->all()['songId'];

        $queue = $request->session()->get('queue', []);

        if (($key = array_search($songId, $queue)) !== false) {
            unset($queue[$key]);
        }
        $request->session()->put('queue', $queue);

        return redirect('/queue');
    }
}
