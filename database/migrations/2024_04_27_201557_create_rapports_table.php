<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapportsTable extends Migration {

	public function up()
	{
		Schema::create('rapports', function(Blueprint $table) {
			$table->softDeletes();
			$table->increments('id');
			$table->string('libelle', 255);
			$table->string('avis', 255);
			$table->timestamps();
			$table->integer('id_user')->unsigned();
			$table->integer('id_informaticien')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('rapports');
	}
}