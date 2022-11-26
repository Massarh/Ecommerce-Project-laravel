<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Order;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','price','quantity','order_id','category_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function order() {
        return $this->belongsTo(Order::class);
    }
}