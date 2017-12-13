<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Internaute extends Eloquent{
    protected $table='Internaute_EmployePotentiel_';
    protected $fillable=['id','nom','prenom','sexe','mail','telephone','matricule','codeverification','motDePasse','etat'];
    public $timestamps=false;
}


