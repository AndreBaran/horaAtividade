<div class="form-group row">
  <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Descricao') }}</label>
  <div class="col-md-6">
    <input id="text" type="text" name="name" value="{{isset($registro->name) ? $registro->name : ''}}">
  </div>

  <div class="form-group row">
    <label for="text" class="col-md-4 col-form-label text-md-right">Status</label>
    <select name="ativo" id="ativo" class="browser-default" value="{{isset($registro->ativo) ? $registro->ativo : '0'}}">
      <option value=0 {{ !isset($registro->ativo) ? '' :
      ($registro->ativo == 0 ? 'selected' : '') }} >Desativado</option>
      <option value=1 {{ !isset($registro->ativo) ? '' :
      ($registro->ativo == 1 ? 'selected' : '') }}>Ativado</option>
    </select>
  </div>

  <div class="form-group row">
    <label for="text" class="col-md-4 col-form-label text-md-right">Professores</label>
    <select name="professor_id" id="professor_id" class="browser-default">
      @foreach($professores as $professor)
      <option value="{{$professor->id}}" {{ !isset($registro->professor_id) ? '' :
      ($registro->professor_id == $professor->id ? 'selected' : '') }}>{{$professor->name}}</option>
      @endforeach
    </select>
  </div>


  @if(Auth::user()->tipo == '0')


  <div class="form-group row">
    <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Escolas') }}</label>
    <select name="escola_id" id="escola_id" class="browser-default">
      @foreach($escolas as $escola)
      <option value="{{$escola->id}}" {{ !isset($registro->escola_id) ? '' :
      ($registro->escola_id == $escola->id ? 'selected' : '') }}>{{$escola->name}}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group row">
    <label for="text" class="col-md-4 col-form-label text-md-right">Tipo</label>
    <select name="tipo" id="tipo" class="browser-default" value="{{isset($registro->tipo) ? $registro->tipo : '2'}}">
      <option value=0 {{ !isset($registro->tipo) ? '' :
      ($registro->tipo == 0 ? 'selected' : '') }}>Master</option>
      <option value=1 {{ !isset($registro->ativo) ? '' :
      ($registro->tipo == 1 ? 'selected' : '') }}>Supervisão</option>
      <option value=2 {{ !isset($registro->tipo) ? '' :
      ($registro->tipo == 2 ? 'selected' : '') }}>Professor</option>
    </select>
  </div>


  @endif
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>


</script>