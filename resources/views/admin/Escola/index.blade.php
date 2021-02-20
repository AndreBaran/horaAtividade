@extends('layouts.site')

@section('site_title','Lista de Escolas')

@section('content')
  <div class="container">
  <br>
    <h3 class="center">Lista de Usuarios</h3>
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome</th>

          </tr>
        </thead>
        <tbody>
          @foreach($registros as $registro)
            <tr>
              <td>{{ $registro->id }}</td>
              <td>{{ $registro->name }}</td>
            </tr>
            <td class="right-align">
              <a class="btn btn-outline-dark" href="{{ route('admin.escola.editar',$registro->id) }}">Editar</a>
              <a class="btn btn-outline-danger" href="{{ route('admin.escola.deletar',$registro->id) }}">Deletar</a>
            </td>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="row">
      <a class="btn btn-outline-success" href="{{ route('admin.escola.adicionar') }}">Adicionar</a>

    </div>

  </div>
  @endsection
