<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->unique();
			$table->string('gender')->nullable();
			$table->tinyInteger('age')->nullable();
			$table->smallInteger('height')->nullable();
			$table->smallInteger('current_weight')->nullable();
			$table->smallInteger('target_weight')->nullable();
			$table->tinyInteger('diet_intensity')->nullable();
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
		Schema::dropIfExists('profiles');
	}
}
