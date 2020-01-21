<?php

	/*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    | Mes Constantes
    |
    | Ici sont définies toutes les constantes de mon application
    |
    */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Constants extends Model
{
    /**
     * Constantes pour la priorité du user
     */
    const MANAGERPRIORITY = '1'; // priorité du gérant d'elecam
	const ADMINPRIORITY = '2';  // priorité du développeur

    /**
     * Constantes pour le statut du dossier d'un inscrit
     */
    const SUBMITTEDINSCRIPTION = '0'; //valeur par défaut
    const REJECTEDINSCRIPTION = '1'; //dossier rejeté
    const VALIDEINSCRIPTION = '2'; //dossier validé

    /**
     * Constantes pour le statut du retrait de la carte d'électeur
     */
    const CARDNOTAVAILABLE = '0'; // certainement la valeur par défaut
    const CARDAVAILABLE = '2'; // Carte dispo
    const CARDREMOVED = '3'; // la carte a été retirée

    /**
     * Constantes pour le niveau de logs généré
     */
    const OTHERLOGSLEVEL = '0';
    const MANAGERLOGSLEVEL = '1';
    const ADMINLOGSLEVEL = '2';
}
