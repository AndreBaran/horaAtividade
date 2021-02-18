@extends('layouts.site')

@section('titulo','Tipo Atividade')

@section('content')
  <div class="container">
    <h3 class="center">Editando Quarto</h3>
    <div class="row">
      <form class="" action="{{route('admin.escola.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        @include('admin.escola._form')
        <button class="btn deep-orange">Atualizar</button>
      </form>
    </div>
  </div>




@endsection
