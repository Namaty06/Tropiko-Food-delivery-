<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'restaurant_id',
        'category_id'
    ];

    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function order(){

        return $this->belongsToMany(Order::class)->withPivot(['quantity','price']);

    }

    public function restaurant(){

        return $this->belongsTo(Restaurant::class);

    }
}
