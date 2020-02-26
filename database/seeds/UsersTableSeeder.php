<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'name' => "Onyx Kyaran",
        	'email' => "email@domain.com",
        	'password' => bcrypt('passwd1234'),
            'priority' => '2',
            'profile_img' => 'koala.jpg',
        ]);
        App\User::create([
            'name' => "Manager 1",
            'email' => "manager1@domain.com",
            'password' => bcrypt('manager6789'),
            'priority' => '1',
        ]);
    }
}
