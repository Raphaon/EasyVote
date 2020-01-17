<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = [
        'codeDep', 'nomDep', 'region_id',
   ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function region(){
        return $this->belongsTo("App\Region");
    }

    public function communes(){
        return $this->hasMany("App\Commune");
    }
}
