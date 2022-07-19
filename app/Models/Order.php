<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'total',
        'comment',
        'phone',
        'city_id',
        'address',
        'user_id',
        'status_id',
        'restaurant_id',
        'delivery_men_id'
    ];

    public function product(){
        
        return $this->belongsToMany(Product::class)->withPivot(['quantity','price']);

    }
    public function restaurant(){
        
        return $this->belongsTo(Restaurant::class);

    }
    public function user(){

        return $this->belongsTo(User::class);

    }
    public function status(){

        return $this->belongsTo(Status::class);

    }
    
    public function scopeStatus($query){
        return $query->where('status','Confirmed' );
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    } 

     public function deliverymen()
    {
        return $this->belongsTo(DeliveryMen::class);
    }   

}
