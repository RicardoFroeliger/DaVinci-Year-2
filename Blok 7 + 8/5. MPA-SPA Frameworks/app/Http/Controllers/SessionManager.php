<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionManager
{
    public function getQueueIds()
    {
        $sessionQueue = Session::get('queue', []);

        return array_map(fn ($s) => $s[1], $sessionQueue);
    }

    public function getQueue()
    {
        $sessionQueue = Session::get('queue', []);
        $queue = Song::find(array_map(fn ($s) => $s[1], $sessionQueue));

        // Sort fetched songs by position added in the queue
        $tempQueue = [];
        foreach ($sessionQueue as $queueSong) {
            $song = array_filter([...$queue], fn ($s) => $s->id == $queueSong[1]);

            array_push($tempQueue, [...$song][0]);
        }

        return collect($tempQueue);
    }

    public function getQueueDuration()
    {
        $queue = $this->getQueue();

        return array_reduce([...$queue], fn ($total, $song) => $total += $song->duration, 0);
    }

    public function pushQueueSong($songId)
    {
        $position = count($this->getQueueIds());

        Session::push('queue', [$position, $songId]);
    }

    public function spliceQueueSong($songId)
    {
        $queue = $this->getQueueIds();

        if (($key = array_search($songId, $queue)) !== false) {
            unset($queue[$key]);
        }

        Session::put('queue', $queue);
    }

    public function forgetQueue()
    {
        Session::forget('queue');
    }
}
