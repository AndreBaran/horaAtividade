<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

<div class="row">
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>

      </tr>
    </thead>
    <tbody>
      @foreach($atividades as $registro)
      <tr>
        <td>{{ $registro->id }}</td>
        <td>{{ $registro->title }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="col-sm-8">
  <select class="form-select " style="width:300px;" aria-label="Default select example" id="cmbProfessorTeste">

  </select>

</div>
<script src="{{asset('assets/fullcalendar/js/script.js')}}"></script>
<script src="{{asset('assets/fullcalendar/js/calendar.js')}}"></script>
<script>
  //console.log('***************************************************');
  //console.log($atividades);
  //'console.log('***************************************************');
</script>