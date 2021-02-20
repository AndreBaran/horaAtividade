<div class="form-group row">
  <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Descricao') }}</label>
  <div class="col-md-6">
    <input id="text" type="text" name="name" value="{{isset($registro->name) ? $registro->name : ''}}">
  </div>
</div>

<div class="form-group row">
  <label>Modo Atividade</label>
  <select name="tipo" id="tipo" class="browser-default" value="{{isset($registro->tipo) ? $registro->tipo : '0'}}">
    <option value=0 {{ !isset($registro->tipo) ? '' :
      ($registro->tipo == 0 ? 'selected' : '') }}>Sala de Aula</option>
    <option value=1 {{ !isset($registro->tipo) ? '' :
      ($registro->tipo == 1 ? 'selected' : '') }}>Hora Atividade</option>
  </select>
</div>


<div class="form-group row">
  <label for="color" class="col-sm-4 col-form-label">Cor do Evento</label>
  <div class="col-sm-8">
    <input type="color" name="color" class="form-control" id="color" value="{{isset($registro->color) ? $registro->color : '#c40233'}}">
  </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>


</script>