<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Diet extends Model
{
    protected $guarded = [];
    
    protected $dates = ['ends_at'];
    
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
        // $dietIntensity serves as a 100x multiplier to set the caloric surplus or deficit of a diet.
        // Ex.: a $dietIntensity of 5 equals an increased or decreased intake of 5 * 100 = 500 calories a day.
        return round(abs($this->getNetEnergy()) / ($this->diet_intensity * 100));
    }
    
    public function setEndDate()
    {
        return $this->ends_at = $this->created_at->addDays($this->getDuration());
    }
    
    public function getDaysLeft()
    {
        $endDate = $this->ends_at;
        $currentDate = currentDate();
        return $endDate->diffInDays($currentDate);
    }
}