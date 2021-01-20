<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    //
        //
        use Notifiable;

        protected $fillable = [
            'dia', 'HoraInicio','HoraFim','professor_id','atividade_id',
        ];
        public function professor()
        {
          return $this->hasOne('App\Professor', 'professor_id');
        }
        public function atividade()
        {
          return $this->hasOne('App\Atividade', 'atividade_id');
        }


}
