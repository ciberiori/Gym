<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Repeticion;

class Usuario extends Model
{
    protected $table="usuarios";
    public $timestamps = false;


    public function repeticiones(){

        return $this->hasMany(Repeticion::class,"ID_Usuario","ID_Usuario");
    }
}
