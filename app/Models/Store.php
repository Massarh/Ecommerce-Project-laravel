<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;

class Store extends Model
{
    use HasFactory;

    protected $fillable =[
        'name', 'slug', 'description', 'image'
    ];

    public function categories() {
        return $this->belongsToMany(Category::class,'store_category')->withTimestamps();
    }

    public function products() { // مو مستخدم
        return $this->hasMany(Product::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
// ORDER
    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}
