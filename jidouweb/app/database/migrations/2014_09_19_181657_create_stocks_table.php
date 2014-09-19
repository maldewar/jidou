<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stocks', function(Blueprint $table) {
			$table->increments('id');
      $table->integer('terminal_id')->unsigned()->index();
      $table->foreign('terminal_id')->references('id')->on('terminals');
      $table->integer('product_id')->unsigned()->index();
      $table->foreign('product_id')->references('id')->on('products');
			$table->boolean('price_override')->default(false);
			$table->float('price')->default(0);
			$table->integer('order')->default(0);
			$table->tinyInteger('promo_type');
			$table->integer('promo_id')->default(0);
			$table->string('related_stock', 120);
			$table->integer('ad_id')->default(0);
			$table->integer('quantity')->default(0);
			$table->integer('hw_id')->default(0)->nullable();
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
		Schema::drop('stocks');
	}

}
