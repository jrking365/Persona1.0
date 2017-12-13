<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class OffreEmploi extends Eloquent{
    protected $table='OffreEmploi';
    protected $fillable=['id','Uti_id','libelle','description','posteOffreid'];
    public $timestamps=false;
}


