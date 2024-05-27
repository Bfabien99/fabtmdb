<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //
    public function index(){
        $response_discover_movie = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer '.env("TMDB_TOKEN")
        ])->get('https://api.themoviedb.org/3/discover/movie?include_adult=false');

        $response_discover_tv = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer '.env("TMDB_TOKEN")
        ])->get('https://api.themoviedb.org/3/discover/tv?include_adult=false');
        return view('home', ['discover_movies'=>json_decode($response_discover_movie->getBody()), 'discover_tv' => json_decode($response_discover_tv->getBody())]);
    }

    public function registerPage(){
        return view('register');
    }

    public function loginPage(){
        return view('login');
    }
}
