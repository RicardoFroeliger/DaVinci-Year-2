<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function index()
    {
        $queue = SessionManager::getQueue();
        $queueDuration = SessionManager::getQueueDuration();

        return view('queue', [
            'queue' => $queue,
            'queueDuration' => $queueDuration
        ]);
    }

    public function store(Request $request)
    {
        $songId = $request->all()['songId'];

        SessionManager::pushQueueSong($songId);

        return redirect('/queue');
    }

    public function destroy(Request $request)
    {
        $songId = $request->all()['songId'];

        SessionManager::spliceQueueSong($songId);

        return redirect('/queue');
    }
}
