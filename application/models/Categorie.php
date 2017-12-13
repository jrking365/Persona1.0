<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Categorie extends Eloquent{
    protected $table='Categorie';
    protected $fillable=['id','libelle'];
    public $timestamps=false;
}


