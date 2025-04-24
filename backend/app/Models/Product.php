<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $attributes = [
        'image' => null
    ];
    protected $fillable = [
        'image',
        'name',
        'description',
        'cost'
    ];
}
