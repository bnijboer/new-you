<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $guarded = [];

    public function __construct($quantity)
    {
        $this->quantity = $quantity;
        $this->energy = $this->product()->energy * $quantity;
    }
    
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}