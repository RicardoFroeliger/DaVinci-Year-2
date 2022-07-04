<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return view('genres', [
            'genres' => $genres
        ]);
    }

    public function show(Genre $genre)
    {
        $songs = Song::where('genre_id', '=', $genre->id)->get();

        return view('genre', [
            'genre' => $genre,
            'songs' => $songs
        ]);
    }
}
