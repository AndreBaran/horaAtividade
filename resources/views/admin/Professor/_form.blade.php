

<div class="form-group row">
    <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
       <div class="col-md-6">
            <input id="text" type="text" name="name" value="{{isset($registro->name) ? $registro->name : ''}}">                             
        </div>
</div>
<div class="form-group row">
    <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Carga Horaria') }}</label>
       <div class="col-md-6">
            <input id="number" type="number" name="carga_horaria" value="{{isset($registro->carga_horaria) ? $registro->carga_horaria : ''}}">                             
        </div>
</div>






<!-- 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
    
     </script>
 
