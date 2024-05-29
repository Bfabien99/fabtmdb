<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;
    public $table = 'favorites';
    protected $fillable = [
        'user_id',
        'type',
        'type_id',
        'poster_path',
        'title'
    ];
}
