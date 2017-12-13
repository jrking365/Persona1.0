<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class TypeAbsence extends Eloquent{
    protected $table='TypeAbsence';
    protected $fillable=['id','libelle','dureeMin','dureeMax'];
    public $timestamps=false;
}


