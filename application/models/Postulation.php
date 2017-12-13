<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Postulation extends Eloquent{
    protected $table='Postulation';
    protected $fillable=['id','Typ_id','Int_id','Off_id','datePostulation'];
    public $timestamps=false;
}


