<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable = [
        'mensagem', 'status', 'title', 'start', 'end', 'color', 'professor_id', 'tipoatividade_id', 'escola_id', 'user_id',
    ];
    public function professor()
    {
        return $this->hasOne('App\Professor', 'professor_id');
    }
    public function atividade()
    {
        return $this->hasOne('App\Atividade', 'tipoatividade_id');
    }
    public function escola()
    {
        return $this->hasOne('App\Escola', 'escola_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'user_id');
    }
}
