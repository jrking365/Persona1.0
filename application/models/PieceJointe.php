<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class PieceJointe extends Eloquent{
    protected $table='PieceJointe';
    protected $fillable=['id','Pos_id','cv','lettreDeMotivation','scanDiplome'];
    public $timestamps=false;
}


