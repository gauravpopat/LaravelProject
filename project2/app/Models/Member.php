<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Member extends Model
{
    use HasFactory;
    //public $timestamps = false;

    protected $casts=[
        'name' => 'encrypted'
    ];

    protected $fillable = ['name','city_name'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = 'Mr. '.$value;
    }
    public function getCityNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function setCityNameAttribute($value){
        return $this->attributes['city_name'] = $value.', India';
    }

    
}
