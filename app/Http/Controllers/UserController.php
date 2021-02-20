<?php

namespace App\Http\Controllers;

use App\Escola;
use App\Professor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
    //$registros = User::all();

    if (Auth::user()->tipo == '0') {
      $registros = User::all();
    } else {
      $registros = User::where('escola_id', Auth::user()->escola_id)
        ->where('tipo', '2')
        ->get();
    }
    return view('admin.user.index', compact('registros'));
  }

  public function adicionar()
  {
    $professores = Professor::where('escola_id', Auth::user()->escola_id)->get();
    $escolas = Escola::all();
    return view('admin.user.adicionar', compact('professores','escolas'));
  }

  public function loadTipos()
  {
    //$tipoAtividades = TipoAtividade::all();
    if (Auth::user()->tipo == 0) {
      $tipoAtividades = User::all();
    } else {
      $tipoAtividades = User::where('escola_id', Auth::user()->escola_id)
        ->where('tipo', '2')
        ->get();
    }


    //return $professores;//response()->json($professors);
    return response()->json($tipoAtividades);
  }


  public function salvar(Request $req)
  {
    
    $dados = $req->all();
   // dd($dados);
    User::create($dados);

    return redirect()->route('admin.user');
  }

  public function editar($id)
  {
    $registro = User::find($id);
    $professores = Professor::where('escola_id', Auth::user()->escola_id)->get();
    $escolas = Escola::all();
    return view('admin.user.editar', compact('registro'), compact('professores','escolas'));
  }

  public function atualizar(Request $req, $id)
  {
    $dados = $req->all();
  
    //dd($dados);
    User::find($id)->update($dados);

    return redirect()->route('admin.user');
  }

  public function deletar($id)
  {
    User::find($id)->delete();
    return redirect()->route('admin.user');
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
  public function show(User $tipoAtividade)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\User  $tipoAtividade
   * @return \Illuminate\Http\Response
   */
  public function edit(User $tipoAtividade)
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
  public function update(Request $request, User $tipoAtividade)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\TipoAtividade  $tipoAtividade
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $tipoAtividade)
  {
    //
  }
}
