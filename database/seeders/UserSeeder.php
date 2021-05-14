<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//
		DB::table('users')->insert([
			'name'     => Str::random(8),
			'email'    => Str::random(6) . '@yahoo.com',
			'password' => Hash::make('testpasswordd123'),
		]);
	}
}
