<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;
use App\Models\Order;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','price','quantity','order_id','store_id'];

    public function store() {
        return $this->belongsTo(Store::class);
    }
    
    public function order() {
        return $this->belongsTo(Order::class);
    }
}