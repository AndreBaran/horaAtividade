@extends('layouts.site')

@section('site_title','Lista de Professores')

@section('content')
  <div class="container">
  <br>
    <h3 class="center">Lista de Atividades</h3>
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Hora Atividade</th>

          </tr>
        </thead>
        <tbody>
          @foreach($registros as $registro)
            <tr>
              <td>{{ $registro->id }}</td>
              <td>{{ $registro->name }}</td>
              <td>{{ $registro->tipo }}</td>
            </tr>
            <td class="right-align">
              <a class="btn btn-outline-dark" href="{{ route('admin.tipoatividade.editar',$registro->id) }}">Editar</a>
              <a class="btn btn-outline-danger" href="{{ route('admin.tipoatividade.deletar',$registro->id) }}">Deletar</a>
            </td>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="row">
      <a class="btn btn-outline-success" href="{{ route('admin.tipoatividade.adicionar') }}">Adicionar</a>

    </div>

  </div>
  @endsection
