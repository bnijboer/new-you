<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
	protected $guarded = [];

    public function ingredients()
	{
		return $this->hasMany(Ingredient::class);
	}
    
	public function products()
	{
		return $this->belongsToMany(Product::class);
	}

	public function totalValue($type)
	{
		return $this->products->sum($type);
	}
}
