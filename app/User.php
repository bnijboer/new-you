<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

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
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::needsRehash($password) ? bcrypt($password) : $password;
    }
    
    // bmr = basal metabolic rate
    // this is the outcome of a formula that determines your energy expenditure per day at rest, based on your gender
    public function bmr()
    {
        $expenditure = 10 * $this->current_weight + 6.25 * $this->height - 5 * $this->age;
        
        switch ($this->gender) {
            case "female":
                return $expenditure - 161;
                break;
            case "male":
                return $expenditure + 5;
                break;
        }
    }
    
    // tdee = total daily energy expenditure, this takes into account a user's level of activity
    public function requiredIntake($bmr)
    {
        $tdee = $bmr * $this->activity_level;
        
        if ($this->onDiet()) {
            
            $diet = $this->diet();
            
            $dailyDeficit = $diet->netEnergy / $diet->duration;
            
            // The deficit for macronutrients is based on the amount of calories per gram of a particular nutrient as well as the ratio between macronutrients.
            // Ratio's can vary depending on diet type (ex. keto, paleo, atkins), but for now this app uses a fixed ratio of 3:3:4 aimed at developing lean muscle mass.
            
            // Calories per gram:
            // - Protein:         4 kcal
            // - Fat:             9 kcal
            // - Carbohydrates:   4 kcal
            
            $deficit = (object) [
                'energy' => round(
                    $dailyDeficit
                ),
                'protein' => round(
                    $dailyDeficit / 4 * 0.3
                ),
                'fat' => round(
                    $dailyDeficit / 9 * 0.3
                ),
                'carbs' => round(
                    $dailyDeficit / 4 * 0.4
                )
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
    
    public function logsOnDate($shownDate)
    {
        return $this->logs()->whereDate('created_at', '=', $shownDate)->get();
    }
    
    public function logs()
    {
        return $this->hasMany(Log::class);
    }
    
    public function diets()
    {
        return $this->hasMany(Diet::class);
    }
    
    public function diet()
    {
        return Diet::find($this->current_diet);
    }
    
    public function activateDiet($diet)
    {
        $this->current_diet = $diet->id;
        $this->current_weight = $diet->starting_weight;
        $this->activity_level = $diet->activity_level;
        
        $this->save();
    }
    
    public function onDiet()
    {
        if ($this->diet() && !\Carbon\Carbon::parse(currentDiet()->ends_at)->isToday()) {
            return true;
        }
        
        return false;
    }
    
    public function endDiet()
    {
        $this->current_diet = null;
        $this->save();
    }
}
