@extends('layouts.site')

@section('site_title','Lista de Professores')

@section('content')
  <div class="container">
  <br>
    <h3 class="center">Lista de Professores</h3>
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Carga Horaria</th>

          </tr>
        </thead>
        <tbody>
          @foreach($registros as $registro)
            <tr>
              <td>{{ $registro->id }}</td>
              <td>{{ $registro->name }}</td>
              <td>{{ $registro->carga_horaria }}</td>
            </tr>
            <td class="right-align">
              <a class="btn btn-outline-dark" href="{{ route('admin.professor.editar',$registro->id) }}">Editar</a>
              <a class="btn btn-outline-danger" href="{{ route('admin.professor.deletar',$registro->id) }}">Deletar</a>
            </td>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="row">
      <a class="btn btn-outline-success" href="{{ route('admin.professor.adicionar') }}">Adicionar</a>

    </div>

  </div>
  @endsection
