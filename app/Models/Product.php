<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'price', 'rating', 'description', 'weight', 'min_weight', 'country_of_origin', 'quality', 'quantity', 'image_url'];
}
