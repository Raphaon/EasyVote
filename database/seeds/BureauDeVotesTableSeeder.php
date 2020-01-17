<?php

use Illuminate\Database\Seeder;

class BureauDeVotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\BureauDeVote::create([
        	'nomBureau' => "Bureau 1",
        	'commune_id' => 1,
        ]);
        App\BureauDeVote::create([
        	'nomBureau' => "Bureau 2",
        	'commune_id' => 2,
        ]);
        App\BureauDeVote::create([
        	'nomBureau' => "Bureau 3",
        	'commune_id' => 1,
        ]);
        App\BureauDeVote::create([
        	'nomBureau' => "Bureau 4",
        	'commune_id' => 1,
        ]);
        App\BureauDeVote::create([
        	'nomBureau' => "Bureau 5",
        	'commune_id' => 2,
        ]);
        App\BureauDeVote::create([
        	'nomBureau' => "Bureau 6",
        	'commune_id' => 1,
        ]);
    }
}
