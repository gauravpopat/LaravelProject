<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class Phone extends Model
{
    use HasFactory;
    public function getPerson(){
        return $this->belongsTo(Person::class,'person_id','id');
    }
}
