<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_series_id', 'material_id', 'description', 'price'];

    public function productSeries()
    {
        return $this->belongsTo(ProductSeries::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

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

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'product_collections', 'product_id', 'collection_id');
    }

}
