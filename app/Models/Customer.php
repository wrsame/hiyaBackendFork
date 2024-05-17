<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;


    //mass assignement, så behøver vi ikke at definere hver attribut alene
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password', 'phone'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);

    }

    public function address()
    {
        return $this->hasMany(Address::class);

    }
}