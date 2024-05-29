<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\TV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //
    private $movie;
    private $tv;

    public function __construct(){
        $this->movie = new Movie();
        $this->tv = new TV();
    }
    public function index(){
        return view('home', ['discover_movies'=> $this->movie->getFewMovie(), 'discover_tv' => $this->tv->getFewTV()]);
    }

    public function registerPage(){
        return view('register');
    }

    public function loginPage(){
        return view('login');
    }
}
