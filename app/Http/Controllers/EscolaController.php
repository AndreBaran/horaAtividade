<?php

namespace App\Http\Controllers;

use App\Escola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EscolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$registros = TipoAtividade::all();
        $registros = Escola::all();
        return view('admin.escola.index',compact('registros'));
    }

    public function adicionar()
    {
      $tipoatividades = Escola::all();
      return view('admin.escola.adicionar',compact('tipoatividades'));
    }
 

    public function salvar(Request $req)
    { 
      $dados = $req->all();
      Escola::create($dados);

      return redirect()->route('admin.escola');

    }

    public function editar($id)
    {
      $registro = Escola::find($id);
      return view('admin.escola.editar',compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
      $dados = $req->all();

      Escola::find($id)->update($dados);

      return redirect()->route('admin.escola');
    }

    public function deletar($id)
    {
        Escola::find($id)->delete();
      return redirect()->route('admin.escola');
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
     * @param  \App\TipoAtividade  $tipoAtividade
     * @return \Illuminate\Http\Response
     */
    public function show(Escola $tipoAtividade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Escola  $tipoAtividade
     * @return \Illuminate\Http\Response
     */
    public function edit(Escola $tipoAtividade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Escola  $tipoAtividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Escola $tipoAtividade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Escola  $tipoAtividade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escola $tipoAtividade)
    {
        //
    }
}
