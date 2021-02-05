<?php

namespace App\Http\Controllers;

use App\Atividade;

use Illuminate\Http\Request;

class FullCalendarController extends Controller
{
    //
    public function index(Request $request)
    {
        $atividades = Atividade::all(); 

       /// $returnedColumns = ['id', 'title', 'start', 'end', 'color','professor_id','tipoatividade_id'];
       // $start = (!empty($request->start)) ? ($request->start) : ('');
       // $end = (!empty($request->end)) ? ($request->end) : ('');
       // $atividades = Atividade::whereBetween('start', [$start, $end])->get($returnedColumns);
        return view('admin.fullcalendar.master', ['atividades' => $atividades]);
    }
}
