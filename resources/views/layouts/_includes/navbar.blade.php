<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
        <li></a><a class="nav-link active" aria-current="page" href="/">Home</a></li>
        </li>
        @if(!Auth::guest())
        @if((Auth::user()->tipo == '1') or (Auth::user()->tipo == '0'))
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.professor')}}">Professor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.tipoatividade')}}">Tipo Atividades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.user')}}">Usuarios</a>
        </li>
        @endif
        @if(Auth::user()->tipo == '0')
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.escola')}}">Escolas</a>
        </li>
        
        @endif
        @if(!Auth::guest())
        @if(Auth::user()->ativo == '1')
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.fullcalendar')}}">Hora Atividade</a>
        </li>
        <li class="nav-item">
          <a id="msg" name="msg" class="nav-link" href="{{route('admin.mensagem')}}">Mensagens <span id="pendente" name="pendente" class="badge badge-light">0</span></a>
        </li>
        @endif
        @endif
        @endif
        
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
        </li>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>

        @endguest
      </ul>

    </div>
  </div>
</nav>

<div id='mensagem_dataset_pen' data-route-mensagem-pendentes={{route('routeMensagemPendentes')}}></div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="{{asset('assets/fullcalendar/js/script_home.js')}}"></script>