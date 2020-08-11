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
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'gender',
        'age',
        'height',
        'current_weight',
        'target_weight',
        'diet_intensity'
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
    
    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
    
    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function totalIntake($logs)
    {
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
