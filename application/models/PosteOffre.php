<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class PosteOffre extends Eloquent{
    protected $table='posteOffre';
    protected $fillable=['id','libelle_posteOffre'];
    public $timestamps=false;
}


