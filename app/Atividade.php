<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Atividade extends Model
{
    //
        //
       //  use Notifiable;

        protected $fillable = [
            'title', 'start','end','color','professor_id','tipoatividade_id','user_id',
        ];
        public function professor()
        {
          return $this->hasOne('App\Professor', 'professor_id');
        }
        public function atividade()
        {
          return $this->hasOne('App\Atividade', 'tipoatividade_id');
        }

        public function getStartAttribute($value)
        {
            $dateStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
            $timeStart = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i:s');
    
            return $this->start = ($timeStart == '00:00:00' ? $dateStart : $value);
        }
    
        public function getEndAttribute($value)
        {
            $dateEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
            $timeEnd = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('H:i:s');
    
            return $this->end = ($timeEnd == '00:00:00' ? $dateEnd : $value);
        }


}
