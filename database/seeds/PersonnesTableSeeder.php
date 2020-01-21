<?php

use Illuminate\Database\Seeder;

class PersonnesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\Personne::create([
    		"nom"	=> "nom1" ,
    		"prenom"	=> "prenom1" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni1.jpeg" ,
    		"photoP"	=> "p1.jpg" ,
    		"commune_id" => 2,
    		"bureau_de_vote_id" => 2,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom2" ,
    		"prenom"	=> "prenom2" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni2.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 3,
    		"bureau_de_vote_id" => 1,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom3" ,
    		"prenom"	=> "prenom3" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni3.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom4" ,
    		"prenom"	=> "prenom4" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh François" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni4.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom5" ,
    		"prenom"	=> "prenom5" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni1.jpeg" ,
    		"photoP"	=> "p1.jpg" ,
    		"commune_id" => 2,
    		"bureau_de_vote_id" => 2,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom6" ,
    		"prenom"	=> "prenom6" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni2.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 3,
    		"bureau_de_vote_id" => 1,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom7" ,
    		"prenom"	=> "prenom7" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni3.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom8" ,
    		"prenom"	=> "prenom8" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh François" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni4.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom1" ,
    		"prenom"	=> "prenom1" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni1.jpeg" ,
    		"photoP"	=> "p1.jpg" ,
    		"commune_id" => 2,
    		"bureau_de_vote_id" => 2,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom2" ,
    		"prenom"	=> "prenom2" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni2.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 3,
    		"bureau_de_vote_id" => 1,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom3" ,
    		"prenom"	=> "prenom3" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni3.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom4" ,
    		"prenom"	=> "prenom4" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh François" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni4.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom5" ,
    		"prenom"	=> "prenom5" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni1.jpeg" ,
    		"photoP"	=> "p1.jpg" ,
    		"commune_id" => 2,
    		"bureau_de_vote_id" => 2,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom6" ,
    		"prenom"	=> "prenom6" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni2.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 3,
    		"bureau_de_vote_id" => 1,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom7" ,
    		"prenom"	=> "prenom7" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni3.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom8" ,
    		"prenom"	=> "prenom8" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh François" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni4.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom1" ,
    		"prenom"	=> "prenom1" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni1.jpeg" ,
    		"photoP"	=> "p1.jpg" ,
    		"commune_id" => 2,
    		"bureau_de_vote_id" => 2,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom2" ,
    		"prenom"	=> "prenom2" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni2.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 3,
    		"bureau_de_vote_id" => 1,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom3" ,
    		"prenom"	=> "prenom3" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni3.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom4" ,
    		"prenom"	=> "prenom4" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh François" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni4.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom5" ,
    		"prenom"	=> "prenom5" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni1.jpeg" ,
    		"photoP"	=> "p1.jpg" ,
    		"commune_id" => 2,
    		"bureau_de_vote_id" => 2,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom6" ,
    		"prenom"	=> "prenom6" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni2.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 3,
    		"bureau_de_vote_id" => 1,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom7" ,
    		"prenom"	=> "prenom7" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni3.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom8" ,
    		"prenom"	=> "prenom8" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh François" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni4.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom1" ,
    		"prenom"	=> "prenom1" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni1.jpeg" ,
    		"photoP"	=> "p1.jpg" ,
    		"commune_id" => 2,
    		"bureau_de_vote_id" => 2,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom2" ,
    		"prenom"	=> "prenom2" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni2.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 3,
    		"bureau_de_vote_id" => 1,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom3" ,
    		"prenom"	=> "prenom3" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni3.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom4" ,
    		"prenom"	=> "prenom4" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh François" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni4.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom5" ,
    		"prenom"	=> "prenom5" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni1.jpeg" ,
    		"photoP"	=> "p1.jpg" ,
    		"commune_id" => 2,
    		"bureau_de_vote_id" => 2,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom6" ,
    		"prenom"	=> "prenom6" ,
    		"dateNaiss"	=> "25-09-1994" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni2.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 3,
    		"bureau_de_vote_id" => 1,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom7" ,
    		"prenom"	=> "prenom7" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh Lombardi" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni3.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    	App\Personne::create([
    		"nom"	=> "nom8" ,
    		"prenom"	=> "prenom8" ,
    		"dateNaiss"	=> "25-10-1999" ,
    		"lieuNaiss"	=> "Baganté" ,
    		"profession_occupation"	=> "Battant" ,
    		"nomPere"	=> "Man Neuh François" ,
    		"nomMere"	=> "Ayota Francine" ,
    		"domicile_residence" => "Maison" ,
    		"numCNI"	=> "010203064" ,
    		"telephone"	=> "237695843164" ,
    		"photocni"	=> "cni4.jpeg" ,
    		"photoP"	=> "p2.jpg" ,
    		"commune_id" => 5,
    		"bureau_de_vote_id" => 4,
            "date_inscription" => time(),
    	]);
    }
}
