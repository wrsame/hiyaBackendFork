<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'status', 'total', 'productCount', 'address_id'];



    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function shipement()
    {
        return $this->hasMany(Shipement::class);
    }
    
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

}
