<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesUsersTable extends Migration {

	public function up()
	{
		Schema::create('types_users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('id_type')->unsigned();
			$table->integer('id_user')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('types_users');
	}
}