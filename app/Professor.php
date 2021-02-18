<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //
    //use Notifiable;

    protected $fillable = [
        'id','name', 'carga_horaria','user_id','escola_id'
    ];
    public function escola()
    {
      return $this->hasOne('App\Escola', 'escola_id');
    }
}
