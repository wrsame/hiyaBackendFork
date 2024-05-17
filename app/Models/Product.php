<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productCollection()
    {
        return $this->hasMany(ProductCollection::class);
    }

}
