<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        
        $requiredIntake = (object) [
            'energy' => round($tdee),
            'protein' => round($tdee / 4  * 0.35),
            'fat' => round($tdee / 9 * 0.25),
            'carbs' => round($tdee / 4 * 0.4)
        ];
        
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
}
