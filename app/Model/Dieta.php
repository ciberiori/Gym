<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    protected $table="dietas";
    public $timestamps = false;
    public $primaryKey  = 'ID_Dieta';
}
