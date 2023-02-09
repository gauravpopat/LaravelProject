<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = "customers";
    protected $primaryKey = "id";



    public function getProduct(){
        return $this->belongsTo(Product::class,'customer_id','id');
        //return $this->belongsTo(Product::class,'id','customer_id');
    }
}
