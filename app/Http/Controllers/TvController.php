<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    public function list(){
        $response_discover_tv = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer '.env("TMDB_TOKEN")
        ])->get('https://api.themoviedb.org/3/discover/tv?include_adult=false');
        return view('series.list', ['discover_tv' => json_decode($response_discover_tv->getBody())]);
    }

    public function show(){
        $id = request('id');
        if(!is_numeric($id) || $id<1){
            return redirect('/tv');
        }
        $response_tv = Http::withHeaders([
            'accept' => 'application/json',
            'Authorization' => 'Bearer '.env("TMDB_TOKEN")
        ])->get('https://api.themoviedb.org/3/tv/'.$id);
        return view('series.show', ['tv'=>json_decode($response_tv->getBody())]);
    }

    public function showLang(){

    }
}