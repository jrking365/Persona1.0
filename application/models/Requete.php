<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Requete extends Eloquent{
    protected $table='Requete';
    protected $fillable=['id','Uti_id','libelle'];
    public $timestamps=false;
}


