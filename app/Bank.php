<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
    protected $fillable = ['nombre','numero_cuenta','tipo_cuenta','usuario_cuenta','usuario_cedula','estado'];
    protected $table ='banks';
}
