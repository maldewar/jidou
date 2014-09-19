<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTerminalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('terminals', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 30);
			$table->float('latitude')->nullable();
			$table->float('longitude')->nullable();
			$table->integer('company_id')->default(0);
			$table->tinyInteger('type')->default(0);
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
		Schema::drop('terminals');
	}

}
