<?php

namespace App\Http\Controllers;

use App\Models\TV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{

    public function list(){
        
        return view('series.list', ['discover_tv' => TV::getAllTV()]);
    }

    public function show(){
        return view('series.show', ['tv'=> TV::getTVById()]);
    }

    public function showLang(){

    }
}
