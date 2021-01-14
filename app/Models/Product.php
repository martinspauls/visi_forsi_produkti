<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description'
    ];

    public function product_attributes()
    {
        return $this->hasMany('App\Models\ProductAttributes');
    }
}
