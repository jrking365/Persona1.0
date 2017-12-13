<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Utilisateur extends Eloquent{
    protected $table='Utilisateur';
    protected $fillable=['id','Pos_id','Gro_id','nom','prenom','sexe','telephone','matricule','mail','login','motDePasse'];
    public $timestamps=false;
}


