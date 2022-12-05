<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'image', 'price', 'additional_info', 'category_id', 'subcategory_id', 'number_of_sold'
    ];

    // public function category()
    // {
    //     return $this->hasOne(Category::class, 'id', 'category_id'); 
    //     // 'id' is a category id in table category , 
    //     //'category_id' is a category id in table product 
    // }

    public function category()
    {
        return $this->belongsTo(Category::class); 
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class); 
    }
}
