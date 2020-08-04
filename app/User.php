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
		'username', 'email', 'password',
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

	public function profile()
	{
		return $this->hasOne(Profile::class);
	}

	public function meals()
	{
		return $this->hasMany(Meal::class);
	}

	public function totalIntake($meals)
	{
		$values = (object) [
			'energy' => 0,
			'protein' => 0,
			'fat' => 0,
			'carbs' => 0
		];

		foreach ($meals as $meal) {
			$values->energy += $meal->totalValue('energy');
			$values->protein += $meal->totalValue('protein');
			$values->fat += $meal->totalValue('fat');
			$values->carbs += $meal->totalValue('carbs');
		}

		return $values;
	}
}
