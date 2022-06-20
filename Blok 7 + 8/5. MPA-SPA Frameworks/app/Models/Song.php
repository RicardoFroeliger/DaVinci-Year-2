<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    public function playlist() 
    {
        $this->belongsToMany(Playlist::class)->withTimestamps();
    }
}
