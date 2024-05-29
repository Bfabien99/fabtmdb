<?php
namespace App\Models;
use Illuminate\Support\Facades\Http;

class Movie{

    static public function getFewMovie(){
        $response_discover_movie = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer '.env("TMDB_TOKEN")
        ])->get('https://api.themoviedb.org/3/discover/movie?include_adult=false');
        return json_decode($response_discover_movie->getBody());
    }

    static public function getAllMovie(){
        request()->validate(
            ['page'=>'numeric|min:1|max:500']
        );
        request('page') > 0 ? $page = request('page') : $page = 1;
        $response_discover_movie = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer '.env("TMDB_TOKEN")
        ])->get('https://api.themoviedb.org/3/discover/movie?include_adult=false&page='.$page);
        return json_decode($response_discover_movie->getBody());
    }

    static public function getMovieById(){
        $id = request('id');
        if(!is_numeric($id) || $id<1){
            return redirect('/movies');
        }
        $response_movie = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer '.env("TMDB_TOKEN")
        ])->get('https://api.themoviedb.org/3/movie/'.$id);
        return json_decode($response_movie->getBody());
    }
}