<div class="form-group row">
  <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Descricao') }}</label>
  <div class="col-md-6">
    <input id="text" type="text" name="name" value="{{isset($registro->name) ? $registro->name : ''}}">
  </div>
</div>
<div class="form-check">
  <p>
    <label>
      <input type="checkbox" value="{{isset($registro->tipo) ? $registro->tipo : '0'}}" 
      onchange="doalert(this)" />
      <span>Hora Atividade</span>
    </label>
  </p>
  <p>
</div>
<div class="form-group row">
  <label>Modo Atividade</label>
  <select class="browser-default" value="{{isset($registro->tipo) ? $registro->tipo : '0'}}">
    <option value=0>Sala de Aula</option>
    <option value=1>Hora Atividade</option>
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