<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealProductTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meal_product', function (Blueprint $table) {
			$table->id();
			$table->foreignId('meal_id');
			$table->foreignId('product_id');
			$table->timestamps();

			$table->unique(['meal_id', 'product_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('meal_product');
	}
}
