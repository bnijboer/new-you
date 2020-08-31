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
    
    // getGoalAttribute
    // getNetEnergyAttribute
    // getDurationGoalAttribute
    // getEndDateAttribute
    // getDaysLeftAttribute
    
    // setGoalAttribute
    // setNetEnergyAttribute
    // setDurationGoalAttribute
    // setEndDateAttribute
    // setDaysLeftAttribute
    
    public function getGoalAttribute()
    {
        return $this->starting_weight - $this->target_weight;
    }
    
    public function getNetEnergyAttribute()
    {
        // 1 kg of body fat equals 7700 calories.
        return $this->goal * 7700;
    }
    
    public function getDurationAttribute()
    {
        // $dietIntensity serves as a 100x multiplier to set the caloric surplus or deficit of a diet.
        // Ex.: a $dietIntensity of 5 equals an increased or decreased intake of 5 * 100 = 500 calories a day.
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