<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Diet;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'gender',
        'age',
        'height',
        'current_weight',
        'activity_level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function bmr()
    {
        switch ($this->gender) {
            case "female":
                return 10 * $this->current_weight + 6.25 * $this->height - 5 * $this->age - 161;
                break;
            case "male":
                return 10 * $this->current_weight + 6.25 * $this->height - 5 * $this->age + 5;
                break;
        }
    }
    
    public function requiredIntake($bmr)
    {
        $tdee = $bmr * $this->activity_level;
        
        if ($this->onDiet()) {
            
            $diet = Diet::find($this->diet_id);
            
            $netWeight = $diet->starting_weight - $diet->target_weight;
        
            // 1 kg of fat equals 77000 calories.
            $netEnergy = $netWeight * 7700;
            
            // $dietIntensity serves as a 100x multiplier to set the 'strictness' of a diet.
            // Ex: a $dietIntensity of 5 equals a heightened or lowered intake of 5 * 100 = 500 calories a day.
            $dietLength = abs($netEnergy) / ($diet->diet_intensity * 100);
            
            $deficit = (object) [
                'energy' => round($netEnergy / $dietLength),
                'protein' => round($netEnergy / $dietLength / 4  * 0.3),
                'fat' => round($netEnergy / $dietLength / 9 * 0.3),
                'carbs' => round($netEnergy / $dietLength / 4 * 0.4)
            ];
            
            $requiredIntake = (object) [
                'energy' => round($tdee) - $deficit->energy,
                'protein' => round($tdee / 4  * 0.3) - $deficit->protein,
                'fat' => round($tdee / 9 * 0.3) - $deficit->fat,
                'carbs' => round($tdee / 4 * 0.4) - $deficit->carbs
            ];
            
        } else {
            $requiredIntake = (object) [
                'energy' => round($tdee),
                'protein' => round($tdee / 4  * 0.3),
                'fat' => round($tdee / 9 * 0.3),
                'carbs' => round($tdee / 4 * 0.4)
            ];
        }
        
        return $requiredIntake;
    }
    
    public function logsOnDate($shownDate)
    {
        return $this->logs()->whereDate('created_at', '=', $shownDate)->get();
    }
    
    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function intakeOnDate($shownDate)
    {
        $logs = $this->logsOnDate($shownDate);
        
        $values = (object) [
            'energy' => 0,
            'protein' => 0,
            'fat' => 0,
            'carbs' => 0
        ];

        foreach ($logs as $log) {
            $values->energy += $log->energy;
            $values->protein += $log->protein;
            $values->fat += $log->fat;
            $values->carbs += $log->carbs;
        }

        return $values;
    }
    
    public function diets()
    {
        return $this->hasMany(Diet::class);
    }
    
    public function onDiet()
    {
        if (Diet::find($this->diet_id)) {
            return true;
        }
        
        $this->diet_id = null;
        $this->save();
        
        return false;
    }
}
