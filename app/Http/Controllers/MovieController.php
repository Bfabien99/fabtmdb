<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;

class MovieController extends Controller
{
    //
    public function list(){
        return view('movies.list', ['discover_movies'=> Movie::getAllMovie()]);
    }

    public function show(){
        
        return view('movies.show', ['movie'=>Movie::getMovieById()]);
    }

    public function showLang(){

    }
}
