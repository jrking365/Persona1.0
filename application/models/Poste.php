<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Poste extends Eloquent{
    protected $table='Poste';
    protected $fillable=['id','Cat_id','Dep_id','nom'];
    public $timestamps=false;
}


