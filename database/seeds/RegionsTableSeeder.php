<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Region::create([
        	'codeReg' => "CE",
        	'nomReg' => "Centre"
        ]);
        App\Region::create([
        	'codeReg' => "OU",
        	'nomReg' => "Ouest"
        ]);
        App\Region::create([
        	'codeReg' => "NE",
        	'nomReg' => "Nord-Est"
        ]);
        App\Region::create([
        	'codeReg' => "NO",
        	'nomReg' => "Nord-Ouest"
        ]);
        App\Region::create([
        	'codeReg' => "SU",
        	'nomReg' => "Sud"
        ]);
    }
}
