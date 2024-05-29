<?php
namespace App\Models;
use Illuminate\Support\Facades\Http;

class TV{
    static public function getFewTV(){
        $response_discover_tv = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer '.env("TMDB_TOKEN")
        ])->get('https://api.themoviedb.org/3/discover/tv?include_adult=false');
        return json_decode($response_discover_tv->getBody());
    }

    static public function getAllTV(){
        request()->validate(
            ['page'=>'numeric|min:1|max:500']
        );
        request('page') > 0 ? $page = request('page') : $page = 1;
        $response_discover_tv = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer '.env("TMDB_TOKEN")
        ])->get('https://api.themoviedb.org/3/discover/tv?include_adult=false&page='.$page);
        return json_decode($response_discover_tv->getBody());
    }

    static public function getTVById(){
        $id = request('id');
        if(!is_numeric($id) || $id<1){
            return redirect('/tv');
        }
        $response_tv = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer '.env("TMDB_TOKEN")
        ])->get('https://api.themoviedb.org/3/tv/'.$id);
        return json_decode($response_tv->getBody());
    }
}