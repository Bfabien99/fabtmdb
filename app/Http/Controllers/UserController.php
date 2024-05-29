<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TV;
use App\Models\Movie;

class UserController extends Controller
{
    //
    public function login(){
        $auth = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(!auth()->attempt($auth)){
            return back()->withInput()->with('error', 'invalid credentials!');
        }
        return redirect('/');
    }

    public function register(){
        $register = request()->validate([
            'email' => 'required|email',
            'name' => 'required|min:3',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        $register['password'] = bcrypt($register['password']);
        $user = User::create($register);
        auth()->login($user);
        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function profilPage(){
        return view('users.profil');
    }

    public function profil(){
        request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => ['required'],
        ]);
        auth()->user()->update([
            'password' => bcrypt(request('password')),
            'email'    => request('email')
        ]);
        return back()->withInput();
    }

    public function favorites(){
        return view('users.favorites', ['favorites' => auth()->user()->favorites()]);
    }

    public function AddFavorite(){
        $type = request('type');
        if($type != 'movie' && $type != 'tv'){
            return back();
        }

        if(count(auth()->user()->favorite($type, request('id')))>0){
            return back()->with('success', 'Already in favorite');
        }

        if($type == 'movie'){
            $data = Movie::getMovieById();
            $title = $data->title;
        }else{
            $data = TV::getTVById();
            $title = $data->name;
        }
        
        Favorites::create([
            'user_id' => auth()->user()->id,
            'type' => $type,
            'type_id' => request('id'),
            'poster_path' => $data->poster_path,
            'title' => $title
        ]);
        return back()->with('success', 'Added to favorites');
    }

    public function RemoveFavorite(){
        if(request('type') != 'movie' && request('type') != 'tv'){
            return back();
        }
        Favorites::where(['user_id' => auth()->user()->id, 'type_id'=>request('id'), 'type'=>request('type')])->delete();
        return back()->with('success', 'Deleted from favorites');
    }

    public function watchlists(){
        return view('users.watchlist', ['watchlists' => auth()->user()->watchlists()]);
    }

    public function AddWatchlist(){
        $type = request('type');
        if($type != 'movie' && $type != 'tv'){
            return back();
        }

        if(count(auth()->user()->watchlist($type, request('id')))>0){
            return back()->with('success', 'Already in favorite');
        }

        if($type == 'movie'){
            $data = Movie::getMovieById();
            $title = $data->title;
        }else{
            $data = TV::getTVById();
            $title = $data->name;
        }
        
        Watchlist::create([
            'user_id' => auth()->user()->id,
            'type' => $type,
            'type_id' => request('id'),
            'poster_path' => $data->poster_path,
            'title' => $title
        ]);
        return back()->with('success', 'Added to watchlist');
    }

    public function RemoveWatchlist(){
        if(request('type') != 'movie' && request('type') != 'tv'){
            return back();
        }
        Watchlist::where(['user_id' => auth()->user()->id, 'type_id'=>request('id'), 'type'=>request('type')])->delete();
        return back()->with('success', 'Deleted from watchlist');
    }
}
