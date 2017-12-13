<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Absence extends Eloquent{
    protected $table='Absence';
    protected $fillable=['id','Typ_id','Uti_id','Typ_id2','lettreExplication','dateDebut','dateFin','libelle','commentaire'];
    public $timestamps=false;
}


