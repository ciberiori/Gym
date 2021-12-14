<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $table="ejercicio";
    public $timestamps = false;

    public function repeticiones(){

        return $this->hasMany(Repeticion::class);
    }
}
