<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug'
    ];

    public function category() {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function product() {
        return $this->hasMany(Product::class);
    }
}
