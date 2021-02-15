$(function () {
  $('.xxxfc-next-but').click(function () {
    //console.log('------aaaaaaaaaaaaa-------');
    // console.log($('#calendar').getEvents());
    //calendar.getStartTime;
    //  var date = calendar.getDate;
    //  var day = moment(date, "MM-DD-YYYY");
    //  var calendar = $('#calendar').fullCalendar('getCalendar');
    // var view = calendar.getView;
    //  var start = view.start._d;
    // var end = view.end._d;
    //  var dates = { start: start, end: end };
    //calendar.next;
    //var date = calendar.getDate();
    alert("The current date of the calendar is " + calendar);
    //alert("The current date of the calendar is " + calendar.state.dateProfile);
    //var month = $('#calendar').fullCalendar('getView').intervalStart.format('MM');
    // var year = $('#calendar').fullCalendar('getView').intervalEnd.format('YYYY');
  });

  $('#btn-divtabela').click(function () {
    //console.log(routeAtividades('routeAtividadeWeeks'));


    let start = $("#divDate input[name='startView']").val();//moment($("#divDate input[name='startView']").val()).format("YYYY-MM-DD HH:mm:ss");
    let end = $("#divDate input[name='endView']").val();//moment($("#divDate input[name='endView']").val()).format("YYYY-MM-DD HH:mm:ss");

    let startLast = $("#divDate input[name='startLastView']").val();
    let endLast = $("#divDate input[name='endLastView']").val();
    console.log(start);
    console.log(end);
    console.log(startLast);
    console.log(endLast);
    let idTurma = $("#cmbAtividade2 option:selected").val();
    let idProfessor = $("#cmbProfessor2 option:selected").val();
    //  let id = $("#divDate input[name='startView']").val();
    // let newElemente.start= start;

    let newElemente = {
      start: start,
      end: end
    };
    console.log('---------------------------------------------------');
    console.log(objCalendar);
    console.log('---------------------------------------------------');
    console.log(newElemente);
    let route = routeAtividades('routeAtividadeWeeks', 'start=' + start + '&end=' + end + '&idProfessor=' + idProfessor + '&idTurma=' + idTurma + 'startLast=' + startLast + '&endLast=' + endLast);
    dados = getAtividadesWeek(route, 'start=' + start + '&end=' + end + '&idProfessor=' + idProfessor + '&idTurma=' + idTurma + 'startLast=' + startLast + '&endLast=' + endLast);
    console.log(dados);


    if (dados.length > 0) {
      var option = '';
      $.each(dados, function (i, obj) {
        option += '<tr>';
        option += '<td>' + obj.name + '</td>';
        // option += '<td>' +  (obj.tipo = 0)+ '</td>';
        option += '<td>' + obj.horaSala + '</td>';
        option += '<td>' + obj.horaAtividade + '</td>';
        let qtDireito = obj.horastrabalhadas * (33 / 100);
        option += '<td>' + qtDireito + '</td>';
        let saldo = qtDireito - obj.horaAtividade;
        option += '<td color=red>' + saldo + '</td>';
        option += '<td>' + obj.horastrabalhadas + '</td>';
        option += '</tr>';


        //   option += '<option value="' + obj.name + '">' + obj.name + '</option>';
      })
      $('#tbodyAtividade').html(option).show();
    };


    //let tipoAtividade =getTipoAtividade(routeAtividades('routeLoadAtividadesWeek'),idAtividade);

  });
});

//document.getElementById('my-button').addEventListener('click', function() {
//    var date = calendar.getDate;
//    alert("The current date of the calendar is " + date);
//  });