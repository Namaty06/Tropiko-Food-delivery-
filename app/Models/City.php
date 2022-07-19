<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'city'
    ];
   

    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function admin()
    {
        return $this->hasMany(Admin::class);
    }
    public function delivery_men()
    {
        return $this->hasMany(DeliveryMen::class);
    }
    public function restaurant()
    {
        return $this->hasMany(Restaurant::class);
    }

}
