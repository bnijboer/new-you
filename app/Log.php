<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $guarded = [];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}