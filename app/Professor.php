<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //
    //use Notifiable;

    protected $fillable = [
        'name', 'carga_horaria',
    ];
}
