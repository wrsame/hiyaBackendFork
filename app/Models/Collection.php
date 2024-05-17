<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status'];

    
    public function productCollection()
    {
        return $this->hasMany(ProductCollection::class);
    }

}
