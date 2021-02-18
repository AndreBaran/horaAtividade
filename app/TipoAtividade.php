<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAtividade extends Model
{
    //
    //use Notifiable;

    protected $fillable = [
        'id','name', 'tipo','color','user_id','escola_id'
    ];
    public function escola()
    {
      return $this->hasOne('App\Escola', 'escola_id');
    }
}
