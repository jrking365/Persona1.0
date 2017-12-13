<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Groupe extends Eloquent{
    protected $table='Groupe';
    protected $fillable=['id','libelle'];
    public $timestamps=false;
}


