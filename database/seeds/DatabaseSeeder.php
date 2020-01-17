<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(DepartementsTableSeeder::class);
        $this->call(CommunesTableSeeder::class);
        $this->call(BureauDeVotesTableSeeder::class);
    }
}
