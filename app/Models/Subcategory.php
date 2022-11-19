<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function product() {
        return $this->hasMany(Product::class);
    }
}
