<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Ejercicio;

class Repeticion extends Model
{
    protected $table="repeticiones";
    public $timestamps = false;

    public function usuario(){
    return $this->belongsTo(Usuario::class, "ID_Usuario","ID_Usuario");
    }

    public function ejercicio(){
      return $this->belongsTo(Ejercicio::class,"Ejercicio","ID_Ejercicio");
    }
}
