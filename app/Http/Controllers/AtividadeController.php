<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\Professor;

use Illuminate\Http\Request;
use App\Http\Requests\AtividadeRequest;

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
        $atividade = Atividade::whereBetween('start', [$start, $end])->get($returnedColumns);
       
        //$atividade = Atividade::all();
        return response()->json($atividade);
    }

    public function loadAtividadesObj()
    {   

        //$atividade = Atividade::groupBy('professor_id');
        $atividade = Atividade::all();
        return $atividade;
    }

    public function loadAtividadeWeeks()
    {   //$dateStart,$dateEnd
        //$dateStart,$dateEnd
        //$atividade = Atividade::groupBy('professor_id')
        //->get('professor_id');

      //  $atividade = Atividade::groupBy('professors.name,tipo_atividades.tipo')
     //   ->join('professors', 'professors.id', '=', 'atividades.professor_id')
     //   ->join('tipo_atividades', 'tipo_atividades.id', '=', 'atividades.tipoatividade_id');
      //  ->selectRaw('(sum(TIMESTAMPDIFF(minute,start,end))/60) as horas')
     
        

      $atividade = Atividade::whereBetween('start', ["2021-01-01 00:00:00", "2021-01-31 00:00:00"])
            ->groupBy('professors.name','tipo_atividades.tipo')
            ->leftJoin('professors', 'atividades.professor_id', '=', 'professors.id')
            ->leftJoin('tipo_atividades', 'atividades.tipoatividade_id', '=', 'tipo_atividades.id')
            ->select('professors.name', 'tipo_atividades.tipo')
            ->selectRaw('(sum(TIMESTAMPDIFF(minute,start,end))/60) as horas')
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
        Atividade::create($request->all());
      //  $professores = Professor::all();
        return response()->json(true);
    } 

    public function update(AtividadeRequest $request)
    {
        $atividade = Atividade::where('id', $request->id)->first();

        $atividade->fill($request->all());

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
