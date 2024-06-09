<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration {

	public function up()
	{
		Schema::create('demandes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('motif', 255);
			$table->string('libelle', 255);
			$table->date('date');
			$table->integer('id_user')->unsigned();
			$table->foreignId('id_informaticien')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('demandes');
	}
}