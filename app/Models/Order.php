<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','total_price','total_quantity'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // ORDER
    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}
