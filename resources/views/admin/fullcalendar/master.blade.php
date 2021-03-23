<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8' />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="{{asset('assets/fullcalendar/lib/main.css')}}" rel='stylesheet' />
  <link href="{{asset('assets/fullcalendar/css/style.css')}}" rel='stylesheet' />
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  @include('layouts._includes.navbar')
  @include('admin.fullcalendar.modal-calendar')
  @include('admin.mensagem.modal-mensagem')


  <div class="clearfix" >

    <div class="box">
      <label for="cmbProfessor2" class="col-sm-4 col-form-label">Professor</label>
      <select class="form-select" style="width:200px;" aria-label="Default select example" id="cmbProfessor2">

      </select>
    </div>

    <div class="box">
      <label for="cmbAtividade2" class="col-sm-4 col-form-label">Atividade</label>

      <select class="form-select" style="width:200px;" aria-label="Default select example" id="cmbAtividade2">

      </select>
    </div>
    <div class="box">
      <button id="botao" type="button"  class="btn btn-outline-dark" justify-content: flex-end>Consultar</button>
      @if((Auth::user()->tipo == '2'))
      <button id="mensagem" type="button"  class="btn btn-outline-info" justify-content: flex-end  onclick="openModal_msg('modalMensagem','')">Mensagem</button>
      @endif
    </div>


  </div>

  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">



      <form class="container-fluid justify-content-start">
        <button id='btn-divcalendario' class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>Calendario
        </button>
        <button id='btn-divtabela' class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>Tabela
        </button>
      </form>
    </nav>
    <div id='wrap'>
      <div id="divDate" class='containerTabela' style="display:none">
        <div id='tabela'>
          @include('admin.fullcalendar.totais')
        </div>

        <input  name="startView" class="form-control date-time" id="startView">
        <input name="endView" class="form-control date-time" id="endView">
        <input  name="startLastView" class="form-control date-time" id="startLastView">
        <input  name="endLastView" class="form-control date-time" id="endLastView">
      </div>
      <div id='calendario' class='containerCalendario' style="display:block">
        <div id='calendar' 
        data-route-load-atividades={{route('routeLoadAtividades')}} 
        data-route-atividade-update={{route('routeAtividadeUpdate')}} 
        data-route-atividade-add={{route('routeAtividadeAdd')}} 
        data-route-atividade-destroy={{route('routeAtividadeDestroy')}} 
        data-route-load-professores={{route('routeLoadProfessores')}} 
        data-route-load-tipos={{route('routeLoadTipos')}} 
        data-route-load-infotipos={{route('routeLoadTipoinfos','')}} 
        data-route-atividade-weeks={{route('routeLoadAtividadeWeeks')}}
        data-route-mensagem-update={{route('routeMensagemUpdate')}} 
        data-route-mensagem-add={{route('routeMensagemAdd')}} 
        data-route-mensagem-destroy={{route('routeMensagemDestroy')}}></div>
      </div>
      <div id='mensagem_dataset' 
        data-route-load-atividades={{route('routeLoadAtividades')}} 
        data-route-atividade-update={{route('routeAtividadeUpdate')}} 
        data-route-atividade-add={{route('routeAtividadeAdd')}} 
        data-route-atividade-destroy={{route('routeAtividadeDestroy')}} 
        data-route-load-professores={{route('routeLoadProfessores')}} 
        data-route-load-tipos={{route('routeLoadTipos')}} 
        data-route-load-infotipos={{route('routeLoadTipoinfos','')}} 
        data-route-atividade-weeks={{route('routeLoadAtividadeWeeks')}}
        data-route-mensagem-update={{route('routeMensagemUpdate')}} 
        data-route-mensagem-add={{route('routeMensagemAdd')}} 
        data-route-mensagem-destroy={{route('routeMensagemDestroy')}}></div>
      <div class="box">
      <button id="botao" type="button2"  class="btn btn-sm btn-outline-secondary" justify-content: flex-end onclick="printDiv('calendario')">Imprimir</button>
    </div>

    </div>



    <script src="{{asset('assets/fullcalendar/lib/main.js')}}"></script>
    <script src="{{asset('assets/fullcalendar/lib/locales-all.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    
    <script>let objCalendar;</script>
    <script src="{{asset('assets/fullcalendar/js/script.js')}}"></script>
    <script src="{{asset('assets/fullcalendar/js/calendar.js')}}"></script>
    <script src="{{asset('assets/fullcalendar/js/total.js')}}"></script>
    <script src="{{asset('assets/fullcalendar/js/script_modal_msg.js')}}"></script>

</body>

</html>