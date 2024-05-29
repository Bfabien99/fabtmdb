<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;
    public $table = 'watchlist';
    protected $fillable = [
        'user_id',
        'type',
        'type_id',
        'poster_path',
        'title'
    ];
}
