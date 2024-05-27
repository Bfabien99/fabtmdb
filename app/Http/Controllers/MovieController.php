<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    //
    public function list(){
        request()->validate(
            ['page'=>'numeric|min:1|max:500']
        );
        request('page') > 0 ? $page = request('page') : $page = 1;
        $response_discover_movie = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer '.env("TMDB_TOKEN")
        ])->get('https://api.themoviedb.org/3/discover/movie?include_adult=false&page='.$page);
        return view('movies.list', ['discover_movies'=>json_decode($response_discover_movie->getBody())]);
    }

    public function show(){
        $id = request('id');
        if(!is_numeric($id) || $id<1){
            return redirect('/movies');
        }
        $response_movie = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer '.env("TMDB_TOKEN")
        ])->get('https://api.themoviedb.org/3/movie/'.$id);
        return view('movies.show', ['movie'=>json_decode($response_movie->getBody())]);
    }

    public function showLang(){

    }
}
