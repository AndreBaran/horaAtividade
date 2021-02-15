<!DOCTYPE html>
<html>
<head>
<style>


table {
  width: 50%;
}
</style>
</head>
<body>
  <div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Professor</th>
      <th scope="col">Horas em Sala de Aula</th>
      <th scope="col">Horas em Atividade</th>
      <th scope="col">Horas Direito</th>
      <th scope="col">Saldo De Horas Atividade</th>
      <th scope="col">Horas Trabalhadas Acumuldadas</th>
    </tr>
  </thead>
  <tbody id="tbodyAtividade">
  </tbody>
</table>
</div>

<script src="{{asset('assets/fullcalendar/js/script.js')}}"></script>
<script src="{{asset('assets/fullcalendar/js/calendar.js')}}"></script>
<script>
  //console.log('***************************************************');
  //console.log($atividades);
  //'console.log('***************************************************');
</script>
</body>