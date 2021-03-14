<!DOCTYPE html>
<html>

<head>
  <title>@yield('site_title')</title>
  <!--Import Google Icon Font-->
  <!--Import materialize.css-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" href="/css/app.css">


  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  @include('layouts._includes.navbar')
  @include('admin.mensagem.modal-mensagem')
  <div class="container">
    <br>
    <h3 class="center">Lista de Mensagens</h3>
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Inicio</th>
            <th>Fim</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($registros as $registro)
          <tr>
            <td>{{$registro->id}}</td>
            <td>{{$registro->title}}</td>
            <td>{{$registro->start}}</td>
            <td>{{$registro->end}}</td>
            <td>
              <select name="tipo" id="tipo" class="browser-default" value="{{isset($registro->status) ? $registro->status : '0'}}" disabled>
                <option value=0 {{ !isset($registro->status) ? '' :
      ($registro->status == 0 ? 'selected' : '') }}>Não Avaliado</option>
                <option value=1 {{ !isset($registro->status) ? '' :
      ($registro->status == 1 ? 'selected' : '') }}>Aprovada</option>
      <option value=2 {{ !isset($registro->status) ? '' :
      ($registro->status == 2 ? 'selected' : '') }}>Rejeitada</option>
              </select>
            </td>
          </tr>
          <td class="right-align">
            <button id="mensagem" type="button" class="btn btn-outline-dark" justify-content: flex-end onclick="openModal_msg('modalMensagem','{{$registro}}')">Editar</button>
            <a class="btn btn-outline-danger" href="{{ route('admin.mensagem.deletar',$registro->id) }}">Deletar</a>
          </td>
          @endforeach
        </tbody>
      </table>
    </div>



  </div>
  <div id='mensagem_dataset' data-route-load-atividades={{route('routeLoadAtividades')}} data-route-atividade-update={{route('routeAtividadeUpdate')}} data-route-atividade-add={{route('routeAtividadeAdd')}} data-route-atividade-destroy={{route('routeAtividadeDestroy')}} data-route-load-professores={{route('routeLoadProfessores')}} data-route-load-tipos={{route('routeLoadTipos')}} data-route-load-infotipos={{route('routeLoadTipoinfos','')}} data-route-atividade-weeks={{route('routeLoadAtividadeWeeks')}} data-route-mensagem-update={{route('routeMensagemUpdate')}} data-route-mensagem-add={{route('routeMensagemAdd')}} data-route-mensagem-destroy={{route('routeMensagemDestroy')}}></div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


  <script src="{{asset('assets/fullcalendar/js/mensagem.js')}}"></script>
  <script src="{{asset('assets/fullcalendar/js/script_modal_msg.js')}}"></script>



</body>