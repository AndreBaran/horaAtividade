

<div class="form-group row">
    <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Descricao') }}</label>
       <div class="col-md-6">
            <input id="text" type="text" name="name" value="{{isset($registro->name) ? $registro->name : ''}}">                             
        </div>
</div>
<div class="form-group row">
    <label for="checkbox" class="col-md-4 col-form-label text-md-right">{{ __('Descricao2') }}</label>
     
            <input id="texta" type="checkbox" name="tipo" value="{{isset($registro->tipo) ? $registro->tipo : ''}}">                          
        
</div>
<input type="checkbox" name="status" value="1">
<div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1"checked="checked">
    <label class="form-check-label" for="exampleCheck1" for="input_id"
    value="1">Hora Atividade</label>
  </div>
  <div>
  <input type="checkbox" id="scales" name="scales"
         checked>
  <label for="scales">Scales</label>
</div>

  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Default checkbox
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled>
  <label class="form-check-label" for="defaultCheck2">
    Disabled checkbox
  </label>
</div>

<div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
    
 
</script>
 
