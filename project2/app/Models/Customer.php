<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Creator;
class Customer extends Model
{
    use HasFactory;
    public function getLatestOrder(){
        return $this->hasOne(Order::class)->oldest();
    }

    public function getMaxOrder(){
        return $this->hasOne(Order::class)->ofMany('price', 'max');
    }

    public function getMinOrder(){
        return $this->hasOne(Order::class)->ofMany('price', 'min');
    }

    public function getCreator(){
        return $this->hasOneThrough(Creator::class, Order::class);
    }

    public function getCreatorHasManyThrow(){
        return $this->hasManyThrough(Creator::class, Order::class);
    }
}
