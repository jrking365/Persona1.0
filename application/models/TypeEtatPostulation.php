<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class TypeEtatPostulation extends Eloquent{
    protected $table='TypeEtatPostulation';
    protected $fillable=['id','Eta_id','libelle_etatPos'];
    public $timestamps=false;
}


