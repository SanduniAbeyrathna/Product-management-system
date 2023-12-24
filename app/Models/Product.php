<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'intro',
        // 'category_id',
    ];

    //ONE TO ONE (Product HAS ONE Category)
    // public function category()
    // {
    //     return $this->hasOne(Category::class, 'id', 'category_id');
    // }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'category_id', 'id');
    // }

    // MANY TO MANY (Product HAS MANY Categories)
    public function categories()
    {
        return $this->belongsToMany(Category::class, ProductCategory::class, 'product_id', 'category_id');
    }

    //ONE TO MANY (Product HAS MANY Comments)
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
}
