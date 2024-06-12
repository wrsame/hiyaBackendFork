<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory;

    // Mass assignment, så behøver vi ikke at definere hver attribut alene
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password', 'phone'
    ];

    // Skjule password attributen
    protected $hidden = [
        'password',
        'remember_token',
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
