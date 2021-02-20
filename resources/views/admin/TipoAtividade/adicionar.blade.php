@extends('layouts.site')

@section('title_name','Tipo Atividade')

@section('content')
  <div class="container">
  <br>
    <h3 class="center">Adicionar Tipo Atividade</h3>
    <div class="row">
      <form class="" action="{{route('admin.tipoatividade.salvar')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('admin.tipoatividade._form')
        <button class="btn btn-outline-success">Salvar</button>
      </form>
    </div>
  </div>




@endsection
