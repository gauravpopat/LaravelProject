<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Phone;

class Person extends Model
{
    use HasFactory;
    public function phone11(){
        return $this->hasOne(Phone::class);
    }

    public function phone12(){
        return $this->hasMany(Phone::class);
    }

}
