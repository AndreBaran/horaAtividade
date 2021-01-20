<?php

namespace App\Http\Controllers;

use App\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros = Professor::all();
        return view('admin.professor.index',compact('registros'));
    }

    public function adicionar()
    {
      $professors = Professor::all();
      return view('admin.professor.adicionar',compact('professors'));
    }

    public function salvar(Request $req)
    {
      $dados = $req->all();
      
      Professor::create($dados);

      return redirect()->route('admin.professor');

    }

    public function editar($id)
    {
      $registro = Professor::find($id);
      return view('admin.professor.editar',compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
      $dados = $req->all();

      Professor::find($id)->update($dados);

      return redirect()->route('admin.professor');
    }

    public function deletar($id)
    {
      Professor::find($id)->delete();
      return redirect()->route('admin.professor');
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
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor)
    {
        //
    }
}
