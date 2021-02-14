<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Professor;

use Illuminate\Http\Request;
use App\Http\Requests\AtividadeRequest;
use Illuminate\Support\Facades\Auth;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function loadProfessores()
    {
        $professores = Professor::all();
        return $professores;//response()->json($professors);
    }


    public function loadAtividades(Request $request)
    {   $returnedColumns = ['id', 'title', 'start', 'end', 'color','professor_id','tipoatividade_id'];
        $start = (!empty($request->start)) ? ($request->start) : ('');
        $end = (!empty($request->end)) ? ($request->end) : ('');

        $idProfessor = (!empty($request->idProfessor)) ? ($request->idProfessor) : ('');
        $idTurma = (!empty($request->idTurma)) ? ($request->idTurma) : ('');
      


        $atividade = Atividade::whereBetween('start', [$start, $end])
                                ->where('user_id', Auth::id())                              
                               // ->where('professor_id',$idProfessor)
                                //->where('tipoatividade_id',$idTurma)  
                                ->where(function($query) use ($idProfessor, $idTurma) {
                                    if ((!empty($idProfessor)) and (!empty($idTurma))) {
                                        return $query->where('professor_id', $idProfessor)
                                              ->where('tipoatividade_id', $idTurma);
                                    }
                                    else if (!empty($idTurma)) {
                                        return $query->where('tipoatividade_id', $idTurma);
                                    }
                                    else if (!empty($idProfessor)) {
                                        return $query->where('professor_id', $idProfessor);
                                    }
                                })
                                

                                ->get($returnedColumns);
       
        //$atividade = Atividade::all();
        return response()->json($atividade);
    }

    public function loadAtividadesObj()
    {   

        //$atividade = Atividade::groupBy('professor_id');
        $atividade = Atividade::all();
        return $atividade;
    }

    public function loadAtividadeWeeks(Request $request)
    {   //$dateStart,$dateEnd
        //$dateStart,$dateEnd
        //$atividade = Atividade::groupBy('professor_id')
        //->get('professor_id');

      //  $atividade = Atividade::groupBy('professors.name,tipo_atividades.tipo')
     //   ->join('professors', 'professors.id', '=', 'atividades.professor_id')
     //   ->join('tipo_atividades', 'tipo_atividades.id', '=', 'atividades.tipoatividade_id');
      //  ->selectRaw('(sum(TIMESTAMPDIFF(minute,start,end))/60) as horas')
      $start =  (!empty($request->start)) ? ($request->start) : ('');
      $end = (!empty($request->end)) ? ($request->end) : ('');
        
      //$atividade = Atividade::whereBetween('start', [$end,$start])
      //$atividade = Atividade::whereBetween('atividades.start', ["2021-01-01 00:00:00", "2021-01-31 00:00:00"])
      
      
      //$atividade = Atividade::whereBetween('atividades.start', [$start,$end])     
      //->groupBy('professors.name','tipo_atividades.tipo')
       //     ->leftJoin('professors', 'atividades.professor_id', '=', 'professors.id')
       //     ->leftJoin('tipo_atividades', 'atividades.tipoatividade_id', '=', 'tipo_atividades.id')
       //     ->select('tipo_atividades.tipo','professors.name')
       //     ->selectRaw('(sum(TIMESTAMPDIFF(minute,start,end))/60) as horas')
       // ->get();
      
      $atividade = Atividade::whereBetween('atividades.start', [$start,$end])
            ->where('atividades.user_id', Auth::id())     
            ->groupBy('professors.name')
            ->leftJoin('professors', 'atividades.professor_id', '=', 'professors.id')
            ->leftJoin('tipo_atividades', 'atividades.tipoatividade_id', '=', 'tipo_atividades.id')
            ->select('professors.name')
            ->selectRaw('sum((CASE WHEN tipo_atividades.tipo=0 THEN (TIMESTAMPDIFF(minute,start,end)) else 0 end)/60) as horaSala')
            ->selectRaw('sum((CASE WHEN tipo_atividades.tipo=1 THEN (TIMESTAMPDIFF(minute,start,end)) else 0 end)/60) as horaAtividade')
            ->get();

        //$atividade = Atividade::all();
        return $atividade;
    }

   

  



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function show(Atividade $atividade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function edit(Atividade $atividade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Atividade $atividade)

    public function add(AtividadeRequest $request)
    {
        $request['user_id'] = Auth::id(); 
        Atividade::create($request->all());
      //  $professores = Professor::all();
        return response()->json(true);
    } 

    public function update(AtividadeRequest $request)
    {
        $atividade = Atividade::where('id', $request->id)->first();
       

        $atividade->fill($request->all());
        $atividade['user_id'] = Auth::id();
        $atividade->save();

        return response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $atividade)
    { 
        $atividade = Atividade::where('id', $atividade->id)->delete();
        return response()->json(true);
    }
}
