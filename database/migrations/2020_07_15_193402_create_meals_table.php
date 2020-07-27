<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meals', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id');
			$table->string('name');
			$table->smallInteger('energy');
			$table->smallInteger('protein');
			$table->smallInteger('fat');
			$table->smallInteger('carbs');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('meals');
	}
}
