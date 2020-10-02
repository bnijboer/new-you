<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Diet extends Model
{
    protected $guarded = [];
    
    protected $dates = ['ends_at', 'created_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getGoalAttribute()
    {
        return $this->starting_weight - $this->target_weight;
    }
    
    // The total caloric deficit or surplus needed to reach your dietary goal
    public function getNetEnergyAttribute()
    {
        return $this->goal * 7700;  // 1 kg of body fat equals 7700 calories.
    }
    
    // diet_intensity determines the length of a diet.
    // Ex.: Increasing diet_intensity means more calories will be burned/consumed each day, shortening the duration of a diet.
    public function getDurationAttribute()
    {
        // $dietIntensity serves as a 100x multiplier to set the caloric surplus or deficit of a diet.
        // Ex.: a $dietIntensity of 5 equals a caloric deficit or surplus of 5 * 100 = 500 calories a day.
        return round(abs($this->netEnergy) / ($this->diet_intensity * 100));
    }
    
    public function getEndDateAttribute()
    {
        return $this->created_at->addDays($this->duration);
    }
    
    public function getDaysLeftAttribute()
    {
        $endDate = $this->ends_at;
        $currentDate = currentDate();
        
        return $endDate->diffInDays($currentDate);
    }
}