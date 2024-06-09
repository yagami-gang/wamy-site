<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformaticiensTable extends Migration {

	public function up()
	{
		Schema::create('informaticiens', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('point_accumule')->nullable();
			$table->integer('id_user')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('informaticiens');
	}
}