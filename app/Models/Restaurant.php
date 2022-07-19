<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'vendor_id',
        'orderPhone',
        'orderEmail',
        'city_id',
        'address',
        'logo',
        'open_time',
        'close_time',
        'day_off',
        
    ];

    

    public function vendor(){

        return $this->belongsTo(Vendor::class);
        
    }

    public function product(){

        return $this->hasMany(Product::class);

    }
    public function order(){

        return $this->hasMany(Order::class);

    }
    public function category(){

        return $this->hasMany(Category::class);

    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
   
   /* public function checking($id){   
        $restaurant = Restaurant::findOrFail($id);
        $check = Carbon::now()->between($restaurant->open_time,$restaurant->close_time , true);
        return $check;
    }
    */
}
