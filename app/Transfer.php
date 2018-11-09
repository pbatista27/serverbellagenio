<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    //
    protected $fillable = ['banco_emisor','bank_id','fecha_transferencia','referencia','monto','estado','service_id','user_id'];

    public function user()
    {
      $this->belongsTo('App\User');
    }
}
