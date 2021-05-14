<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrmBetweenPicsAndUsers extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

		//
		Schema::table('gallery', function (Blueprint $table) {
			$table->integer('userid');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('gallery', function (Blueprint $table) {
			$table->dropColumn('userid');
		});
		//
	}
}
