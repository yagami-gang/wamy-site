<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('demandes', function(Blueprint $table) {
			$table->foreign('id_user')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('rapports', function(Blueprint $table) {
			$table->foreign('id_user')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('rapports', function(Blueprint $table) {
			$table->foreign('id_informaticien')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('informaticiens', function(Blueprint $table) {
			$table->foreign('id_user')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('types_users', function(Blueprint $table) {
			$table->foreign('id_type')->references('id')->on('types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('types_users', function(Blueprint $table) {
			$table->foreign('id_user')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('demandes', function(Blueprint $table) {
			$table->dropForeign('demandes_id_user_foreign');
		});
		Schema::table('rapports', function(Blueprint $table) {
			$table->dropForeign('rapports_id_user_foreign');
		});
		Schema::table('rapports', function(Blueprint $table) {
			$table->dropForeign('rapports_id_informaticien_foreign');
		});
		Schema::table('informaticiens', function(Blueprint $table) {
			$table->dropForeign('informaticiens_id_user_foreign');
		});
		Schema::table('types_users', function(Blueprint $table) {
			$table->dropForeign('types_users_id_type_foreign');
		});
		Schema::table('types_users', function(Blueprint $table) {
			$table->dropForeign('types_users_id_user_foreign');
		});
	}
}