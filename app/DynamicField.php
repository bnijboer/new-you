<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DynamicField extends Model
{
    protected $fillable = [
        'product_name', 'quantity'
    ];
}