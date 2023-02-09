<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "id";


    public function getCustomer(){
        // //return $this->hasOne('App\Models\Product');
       return $this->hasMany(customer::class,'id','customer_id') ;
    }
}
