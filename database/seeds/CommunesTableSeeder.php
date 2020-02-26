<?php

use Illuminate\Database\Seeder;

class CommunesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Commune::create([
        	'codeCom' => "Com1",
        	'nomCom' => "Nom Com 1",
        	'departement_id' => 1,
        ]);
        App\Commune::create([
        	'codeCom' => "Com2",
        	'nomCom' => "Nom Com 2",
        	'departement_id' => 2,
        ]);
        App\Commune::create([
        	'codeCom' => "Com3",
        	'nomCom' => "Nom Com 3",
        	'departement_id' => 3,
        ]);
        App\Commune::create([
        	'codeCom' => "Com4",
        	'nomCom' => "Nom Com 4",
        	'departement_id' => 4,
        ]);
        App\Commune::create([
        	'codeCom' => "Com7",
        	'nomCom' => "Nom Com 7",
        	'departement_id' => 3,
        ]);
        App\Commune::create([
        	'codeCom' => "Com8",
        	'nomCom' => "Nom Com 8",
        	'departement_id' => 4,
        ]);
        App\Commune::create([
        	'codeCom' => "Com3",
        	'nomCom' => "Nom Com 5",
        	'departement_id' => 5,
        ]);
        App\Commune::create([
        	'codeCom' => "Com6",
        	'nomCom' => "Nom Com 6",
        	'departement_id' => 6,
        ]);
        App\Commune::create([
            'codeCom' => "Com1",
            'nomCom' => "Nom Com 1",
            'departement_id' => 7,
        ]);
        App\Commune::create([
            'codeCom' => "Com2",
            'nomCom' => "Nom Com 2",
            'departement_id' => 8,
        ]);
        App\Commune::create([
            'codeCom' => "Com3",
            'nomCom' => "Nom Com 3",
            'departement_id' => 9,
        ]);
        App\Commune::create([
            'codeCom' => "Com4",
            'nomCom' => "Nom Com 4",
            'departement_id' => 10,
        ]);
        App\Commune::create([
            'codeCom' => "Com7",
            'nomCom' => "Nom Com 7",
            'departement_id' => 9,
        ]);
        App\Commune::create([
            'codeCom' => "Com8",
            'nomCom' => "Nom Com 8",
            'departement_id' => 10,
        ]);
        App\Commune::create([
            'codeCom' => "Com3",
            'nomCom' => "Nom Com 5",
            'departement_id' => 11,
        ]);
        App\Commune::create([
            'codeCom' => "Com6",
            'nomCom' => "Nom Com 6",
            'departement_id' => 12,
        ]);
    }
}
