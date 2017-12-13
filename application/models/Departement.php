<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Departement extends Eloquent{
    protected $table='Departement';
    protected $fillable=['id','libelle'];
    public $timestamps=false;
}


