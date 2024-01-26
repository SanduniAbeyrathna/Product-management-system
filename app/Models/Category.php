<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    // protected $guarded = [];
    protected $fillable = [
        'name',
    ];


    //One to Many (Category has many Products)
    // public function products()
    // {
    //     return $this->hasMany(Product::class, 'category_id', 'id');
    // }

    // MANY TO MANY (Category has MANY Products)
    public function products()
    {
        return $this->belongsToMany(Product::class, ProductCategory::class, 'category_id', 'product_id');
    }

    //HAS MANY THROUGH (Category => reviews)
    public function reviews()
    {
        return $this->hasManyThrough(Review::class, Product::class, 'category_id', 'product_id', 'id');
    }

}