<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        // $genres = [
        //     ['name' => 'Pop', 'url' => 'pop'],
        //     ['name' => 'House', 'url' => 'house'],
        //     ['name' => 'Hiphop / Rap', 'url' => 'hiphoprap'],
        //     ['name' => 'Electronic', 'url' => 'electronic'],
        //     ['name' => 'Rock', 'url' => 'rock']
        // ];
        $genres = Genre::all();

        return view('genres', ['genres' => $genres]);
    }

    public function show($genre)
    {
        if ($genre) {
            return view('genre', ['genre' => $genre]);
        } else {
            return view('genres');
        }
    }
}
