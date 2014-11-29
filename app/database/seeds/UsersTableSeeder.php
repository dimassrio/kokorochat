<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create(array('username'=>'admin', 'password'=>Hash::make('admin'), 'phone'=>'082214250262'));
		User::create(array('username'=>'admin2', 'password'=>Hash::make('admin2'), 'phone'=>'082214250262'));
	}

}