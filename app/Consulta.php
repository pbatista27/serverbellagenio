<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    //
    protected $fillable=['dato','consulta','estado','transfer_id','user_id'];
    protected $table='consultas';
}
