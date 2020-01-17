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
    const MANAGERPRIORITY = '1';
	const ADMINPRIORITY = '2';
	const SUPERADMINPRIORITY = '3';
}
