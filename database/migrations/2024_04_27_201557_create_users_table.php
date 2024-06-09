<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 255);
			$table->string('password', 255);
			$table->string('email', 255);
			$table->timestamp('email_verified_at')->nullable();
			$table->rememberToken();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}