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
    
    public function endDate()
    {
        $netWeight = $this['starting_weight'] - $this['target_weight'];
        
        // 1 kg of fat equals 77000 calories.
        $netEnergy = $netWeight * 7700;
        
        // $dietIntensity serves as a 100x multiplier to set the 'strictness' of a diet.
        // Ex: a $dietIntensity of 5 equals a heightened or lowered intake of 5 * 100 = 500 calories a day.
        $dietLength = round(abs($netEnergy) / ($this['diet_intensity'] * 100));
        
        $endDate = currentDate()->addDays($dietLength);

        return $endDate;
    }
    
    public function toggleActive()
    {
        $user = User::find($this->user_id);
        $user->diet_id = $this['id'];
        $user->current_weight = $this->starting_weight;
        $user->activity_level = $this->activity_level;
        
        return $user->update();
    }
}
