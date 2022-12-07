<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\OrderItem;

class Category extends Model
{
    use HasFactory;

    protected $fillable =[
        'name', 'slug', 'description', 'image'
    ];

    public function subcategory() {
        return $this->belongsToMany(Subcategory::class)->withTimestamps();
    }

    public function product() { // مو مستخدم
        return $this->hasMany(Product::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
// ORDER
    public function orderItem() {
        return $this->hasMany(OrderItem::class);
    }
}
