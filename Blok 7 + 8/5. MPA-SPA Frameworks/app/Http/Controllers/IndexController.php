<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return view('index', ['genres' => $genres]);
    }
}
