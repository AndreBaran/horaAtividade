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


    public function loadAtividades()
    { 
        $atividade = Atividade::all();
        return response()->json($atividade);
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
