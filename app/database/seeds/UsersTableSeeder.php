<?php

// Composer: "fzaninotto/faker": "v1.3.0"

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create(array('username'=>'admin', 'password'=>Hash::make('admin'), 'phone'=>'082214250262'));
	}

}