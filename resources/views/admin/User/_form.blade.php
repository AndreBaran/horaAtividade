<div class="form-group row">
  <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Descricao') }}</label>
  <div class="col-md-6">
    <input id="text" type="text" name="name" value="{{isset($registro->name) ? $registro->name : ''}}">
  </div>
  <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Ativo') }}</label>
  <div class="col-md-6">
    <input id="text" type="text" name="ativo" value="{{isset($registro->ativo) ? $registro->ativo : ''}}">
  </div>
  @if(Auth::user()->tipo == '0')
  <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Escola') }}</label>
  <div class="col-md-6">
    <input id="text" type="text" name="escola_id" value="{{isset($registro->escola_id) ? $registro->escola_id : ''}}">
  </div>
  <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>
  <div class="col-md-6">
    <input id="text" type="text" name="tipo" value="{{isset($registro->tipo) ? $registro->tipo : ''}}">
  </div>
  @endif
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>


</script>