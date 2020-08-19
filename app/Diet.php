<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Diet extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getGoal()
    {
        return $this->starting_weight - $this->target_weight;
    }
    
    public function getNetEnergy()
    {
        // 1 kg of body fat equals 7700 calories.
        return $this->getGoal() * 7700;
    }
    
    public function getDuration()
    {
        // $dietIntensity serves as a 100x multiplier to set the caloric increase or deficit of a diet.
        // Ex: a $dietIntensity of 5 equals a heightened or lowered intake of 5 * 100 = 500 calories a day.
        return round(abs($this->getNetEnergy()) / ($this->diet_intensity * 100));
    }
    
    public function getEndDate()
    {
        return currentDate()->addDays($this->getDuration());
    }
}