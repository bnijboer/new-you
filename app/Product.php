<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function meals()
    {
        return $this->belongsToMany(Meal::class);
    }
}
