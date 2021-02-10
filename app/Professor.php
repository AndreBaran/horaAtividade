<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //
    //use Notifiable;

    protected $fillable = [
        'id','name', 'carga_horaria','user_id'
    ];
    public function user()
    {
      return $this->hasOne('App\User', 'user_id');
    }
}
