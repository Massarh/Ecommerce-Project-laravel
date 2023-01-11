<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;
use App\Models\Category;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'image', 'price', 'additional_info','store_id', 'category_id',  'number_of_sold','section'
    ];

    // public function category()
    // {
    //     return $this->hasOne(Category::class, 'id', 'category_id'); 
    //     // 'id' is a category id in table category , 
    //     //'category_id' is a category id in table product 
    // }

    public function store()
    {
        return $this->belongsTo(Store::class); 
    }

    public function category()
    {
        return $this->belongsTo(Category::class); 
    }
}
