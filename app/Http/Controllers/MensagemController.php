<?php

namespace App\Http\Controllers;

use App\Mensagem;
use App\Atividade;
use App\Professor;
use App\TipoAtividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MensagemController extends Controller
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
        //$registros = TipoAtividade::where('user_id', Auth::id())->get();

        if (Auth::user()->tipo == '0') {
            $registros = Mensagem::all();
        } else {
            if (Auth::user()->tipo == '1') {
                $registros = Mensagem::where('escola_id', Auth::user()->escola_id)
                    ->get();
            } else {
                $registros = Mensagem::where('escola_id', Auth::user()->escola_id)
                    ->where('user_id', Auth::id())
                    ->get();
            }
        }
        $professores = Professor::where('escola_id', Auth::user()->escola_id)->get();
        $atividades = TipoAtividade::where('escola_id', Auth::user()->escola_id)->get();
        return view('admin.mensagem.index', compact('registros'));
    }

    public function adicionar()
    {
        $mensagens = Mensagem::all();
        return view('admin.mensagem.adicionar', compact('mensagens'));
    }



    public function salvar(Request $req)
    {
        $dados = $req->all();
        // $dados['user_id'] = Auth::id();
        $dados['escola_id'] = Auth::user()->escola_id;
        $dados['user_id'] = Auth::id();
        if (Auth::user()->professor_id != null) {
            $dados['professor_id'] = Auth::user()->professor_id;
        }
        Mensagem::create($dados);

        return redirect()->route('admin.mensagem');
    }

    public function editar($id)
    {
        $registro = Mensagem::find($id);
        return view('admin.mensagem.editar', compact('registro'));
    }

    public function atualizar(Request $req, $id)
    {
        $dados = $req->all();

        Mensagem::find($id)->update($dados);

        return redirect()->route('admin.mensagem');
    }

    public function deletar($id)
    {
        Mensagem::find($id)->delete();
        return redirect()->route('admin.mensagem');
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

    public function add(Request $request)
    {
        $request['escola_id'] = Auth::user()->escola_id;
        $request['user_id'] = Auth::id();
        Mensagem::create($request->all());
        //  $professores = Professor::all();
        return response()->json(true);
    }

    public function update(Request $request)
    {
        $atividade = Mensagem::where('id', $request->id)->first();


        $atividade->fill($request->all());
        $request['escola_id'] = Auth::user()->escola_id;
        $atividade->save();

        return response()->json(true);
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
    public function show(Mensagem $tipoAtividade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensagem  $tipoAtividade
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensagem $tipoAtividade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensagem  $tipoAtividade
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensagem  $tipoAtividade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $mensagem)
    {
        $mensagem = Mensagem::where('id', $mensagem->id)->delete();
        return response()->json(true);
    }
}
