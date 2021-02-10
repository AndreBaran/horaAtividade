<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAtividade extends Model
{
    //
    //use Notifiable;

    protected $fillable = [
        'id','name', 'tipo','color','user_id',
    ];
    public function user()
    {
      return $this->hasOne('App\User', 'user_id');
    }
}
