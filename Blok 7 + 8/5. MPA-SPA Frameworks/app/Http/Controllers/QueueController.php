<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index()
    {
        $queue = (new SessionManager)->getQueue();
        $queueDuration = (new SessionManager)->getQueueDuration();

        return view('queue', [
            'queue' => $queue,
            'queueDuration' => $queueDuration
        ]);
    }

    public function store(Request $request)
    {
        $songId = $request->all()['songId'];

        (new SessionManager)->pushQueueSong($songId);

        return redirect('/queue');
    }

    public function destroy(Request $request)
    {
        $songId = $request->all()['songId'];

        (new SessionManager)->spliceQueueSong($songId);

        return redirect('/queue');
    }
}
