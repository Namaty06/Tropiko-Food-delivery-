<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'role'
    ];

    public function order(){
     
        return $this->hasMany(Order::class);
     
    }

    

}
