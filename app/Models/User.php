<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function favorites(){
        return Favorites::where(['user_id' => auth()->user()->id])->get();
    }

    public function watchlists(){
        return Watchlist::where(['user_id' => auth()->user()->id])->get();
    }

    public function favorite($type, $id){
        return Favorites::where(['user_id' => auth()->user()->id, 'type'=>$type, "type_id"=>$id])->get();
    }

    public function watchlist($type, $id){
        return Watchlist::where(['user_id' => auth()->user()->id, 'type'=>$type, "type_id"=>$id])->get();
    }
}
