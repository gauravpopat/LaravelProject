<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    public function singer()
    {
        return $this->belongsToMany(Singer::class, 'song_singers')->orderBy('singer_name');
    }
}
