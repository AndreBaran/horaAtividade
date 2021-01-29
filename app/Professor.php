<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //
    //use Notifiable;

    protected $fillable = [
        'id','name', 'carga_horaria',
    ];
}
