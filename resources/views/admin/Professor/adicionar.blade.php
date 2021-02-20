@extends('layouts.site')

@section('title_name','Professor')

@section('content')
  <div class="container">
  <br>
    <h3 class="center">Adicionar Quarto</h3>
    <div class="row">
      <form class="" action="{{route('admin.professor.salvar')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('admin.professor._form')
        <button class="btn btn-outline-success">Salvar</button>
      </form>
    </div>
  </div>




@endsection
