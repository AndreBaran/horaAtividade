<?php

namespace App\Http\Controllers;

use App\TipoAtividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TipoAtividadeController extends Controller
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
        $registros = TipoAtividade::where('user_id', Auth::id())->get();
        return view('admin.tipoatividade.index',compact('registros'));
    }

    public function adicionar()
    {
      $tipoatividades = TipoAtividade::all();
      return view('admin.tipoatividade.adicionar',compact('tipoatividades'));
    }

    public function loadTipos()
    {
        //$tipoAtividades = TipoAtividade::all();
        $tipoAtividades = TipoAtividade::where('user_id', Auth::id())->get();
        //return $professores;//response()->json($professors);
        return response()->json($tipoAtividades);
    }

    public function loadTipoinfos($id)
    {//$id
      //$tipoAtividadeInfo = TipoAtividade::all();
      $tipoAtividadeInfo = TipoAtividade::find($id);
      return response()->json($tipoAtividadeInfo);
    }

    public function salvar(Request $req)
    { 
      $dados = $req->all();
      $dados['user_id'] = Auth::id();
      TipoAtividade::create($dados);

      return redirect()->route('admin.tipoatividade');

    }

    public function editar($id)
    {
      $registro = TipoAtividade::find($id);
      return view('admin.tipoatividade.editar',compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
      $dados = $req->all();

      TipoAtividade::find($id)->update($dados);

      return redirect()->route('admin.tipoatividade');
    }

    public function deletar($id)
    {
      TipoAtividade::find($id)->delete();
      return redirect()->route('admin.tipoatividade');
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
    public function show(TipoAtividade $tipoAtividade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoAtividade  $tipoAtividade
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoAtividade $tipoAtividade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoAtividade  $tipoAtividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoAtividade $tipoAtividade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoAtividade  $tipoAtividade
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoAtividade $tipoAtividade)
    {
        //
    }
}
