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
		'name', 'email', 'password',
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

	public function totalIntake($allMeals)
	{
		$totalIntake = [
			'energy' => 0,
			'protein' => 0,
			'fat' => 0,
			'carbs' => 0,
		];

		foreach ($allMeals as $meal) {
			$totalIntake['energy'] += $meal['energy'];
			$totalIntake['protein'] += $meal['protein'];
			$totalIntake['fat'] += $meal['fat'];
			$totalIntake['carbs'] += $meal['carbs'];
		}

		return $totalIntake;
	}
}
