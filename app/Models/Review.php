<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable =[
        'product_id',
        'comment',
    ];

    //review HAS ONE Product
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}