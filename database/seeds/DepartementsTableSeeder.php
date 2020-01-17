<?php

use Illuminate\Database\Seeder;

class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Departement::create([
        	'codeDep' => "Dep1",
        	"nomDep" => "Nom Dep 1",
        	'region_id' => 1,
        ]);
        App\Departement::create([
        	'codeDep' => "Dep2",
        	"nomDep" => "Nom Dep 2",
        	'region_id' => 2,
        ]);
        App\Departement::create([
        	'codeDep' => "Dep3",
        	"nomDep" => "Nom Dep 3",
        	'region_id' => 4,
        ]);
        App\Departement::create([
        	'codeDep' => "Dep4",
        	"nomDep" => "Nom Dep 4",
        	'region_id' => 1,
        ]);
        App\Departement::create([
        	'codeDep' => "Dep5",
        	"nomDep" => "Nom Dep 5",
        	'region_id' => 2,
        ]);
        App\Departement::create([
        	'codeDep' => "Dep6",
        	"nomDep" => "Nom Dep 6",
        	'region_id' => 4,
        ]);
    }
}
