<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealProduct extends Model
{
    protected $fillable = [
        'product_name', 'quantity'
    ];
}
