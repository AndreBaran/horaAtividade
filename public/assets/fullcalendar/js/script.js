
window.onbeforeunload = function()
{
    document.getElementById("botao").click();
}

$(function () {

    $('.date-time').mask('00/00/0000 00:00:00');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.getJSON(routeAtividades('routeLoadProfessores'), function (dados) {
       // console.log(dados);
        if (dados.length > 0) {
            var option = '';
            option += '<option value=""></option>';
            $.each(dados, function (i, obj) {
                option += '<option value="' + obj.id + '">' + obj.name + '</option>';
            })
            $('#cmbProfessor').html(option).show();
            $('#cmbProfessor2').html(option).show();
        } else {
            Reset();
            $('#mensagem').html('<span class="mensagem">Não foram encontrados Professores!</span>');
        }
    });

    $.getJSON(routeAtividades('routeLoadProfessores'), function (dados) {
        console.log(dados);
        if (dados.length > 0) {
            var option = '';
            option += '<option value=""></option>';
            $.each(dados, function (i, obj) {
                option += '<option value="' + obj.id + '">' + obj.name + '</option>';
            })
            $('#cmbProfessorTeste').html(option).show();
        } else {
            Reset();
            $('#mensagem').html('<span class="mensagem">Não foram encontrados Professores!</span>');
        }
    });
    $.getJSON(routeAtividades('routeLoadTipos'), function (dados) {
        console.log(dados);
        if (dados.length > 0) {
            var option = '';
            option += '<option value=""></option>';
            $.each(dados, function (i, obj) {
                option += '<option value="' + obj.id + '">' + obj.name + '</option>';
            })
            $('#cmbAtividade').html(option).show();
            $('#cmbAtividade2').html(option).show();
        };
    });


    $(".deleteEvent").click(function () {

        let id = $("#modalCalendar input[name='id']").val();

        let Atividade = {
            id: id,
            _method: 'DELETE'
        };

        let route = routeAtividades('routeAtividadeDestroy');
        console.log('-------------');
        console.log(route);
        console.log('-------------');
        sendAtividade(route, Atividade);

    });
   

    $(".saveEvent").click(function () {
        let professor = $("#cmbProfessor option:selected").text();
        let idProfessor = $("#cmbProfessor option:selected").val();

        let Atividade = $("#cmbAtividade option:selected").text();
        let idAtividade = $("#cmbAtividade option:selected").val();

        console.log('-------------');
        let descricao = professor+' '+Atividade;
       // console.log(teste);
        console.log(idProfessor);
        console.log('-------------');

        let id = $("#modalCalendar input[name='id']").val();

        let title = $("#modalCalendar input[name='title']").val();

        let start = moment($("#modalCalendar input[name='start']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");

        let end = moment($("#modalCalendar input[name='end']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");
        let tipoAtividade =getTipoAtividade(routeAtividades('routeLoadInfotipos'),idAtividade);
        let color = tipoAtividade.color;//$("#modalCalendar input[name='color']").val();

        let Event = {
            title: descricao,
            start: start,
            end: end,
            color: color,
            //extendedProps.event.professor_id=idProfessor,
            professor_id: idProfessor,
            tipoatividade_id: idAtividade,
        };


        let testeoooooooooooooo = {
            title: title,
            start: start,
            end: end,
            colorsss: color,
            //aaaaprofessor_id =idProfessor,
            //  atividade_id =idAtividade,
        };

        let route;

        if (id == '') {
            route = routeAtividades('routeAtividadeAdd');
        } else {
            route = routeAtividades('routeAtividadeUpdate');
            Event.id = id;
            Event._method = 'PUT';
        }
        console.log('-------------');

        console.log(testeoooooooooooooo);
        console.log('-------------');

        sendAtividade(route, Event);
    });
})

//let objCalendar;

function sendAtividade(route, data_) {
 //   console.log('***************');
    console.log(data_);
    console.log(route);
    $.ajax({
        url: route,
        data: data_,
        method: 'POST',
        dataType: 'json',
        success: function (json) {
            console.log(json);
            if (json) {
                objCalendar.refetchEvents(); 
                //console.log(location);
                //$('#calendario').load(location.href +  '#calendario');
                //location.reload();
            }
        },
        error: function (json) {

            console.log('***************');
            console.log(json.responseJSON);
            console.log('***************');
            let responseJSON = json.responseJSON.errors;
            alert(responseJSON);
            $(".message").html(loadErrors(responseJSON));
        }
    });
}

function getTipoAtividade(route, data_) {
     var tipoAtividade;
     $.ajaxSetup({
        async: false
      });
     $.getJSON(route+'/'+data_, function (dados) {
        tipoAtividade=dados;
    });
    $.ajaxSetup({
        async: true
      });
    return tipoAtividade;
   }

function getAtividadesWeek(route, data_) {
    var tipoAtividade;
    $.ajaxSetup({
       async: false
     });
    $.getJSON(route+'?'+data_, function (dados) {
       tipoAtividade=dados;
   });
   $.ajaxSetup({
       async: true
     });
   return tipoAtividade;
  }

function loadErrors(response) {

    let boxAlert = `<div class="alert alert-danger">`;

    for (let fields in response) {
        boxAlert += `<span>${response[fields]}</span><br/>`;
    }

    boxAlert += `</div>`;

    return boxAlert.replace(/\,/g, "<br/>");
}

function clearMessages(element) {
    $(element).text('');
}

function routeAtividades(route) {
    return document.getElementById('calendar').dataset[route];
}

function routeTeste(route) {
    return document.getElementById('calendar').dataset;
}

function resetForm(form) {
    $(form)[0].reset();
}

var btntabela = document.getElementById('btn-divtabela');
var containerTabela = document.querySelector('.containerTabela');
var containerCalendario = document.querySelector('.containerCalendario');
btntabela.addEventListener('click', function() {
   console.log(containerTabela.style.display); 
  if(containerTabela.style.display === 'block') {
    containerTabela.style.display = 'none';
    containerCalendario.style.display = 'block';
  } else {
    containerTabela.style.display = 'block';
    containerCalendario.style.display = 'none';
  }
});

function printDiv(divID) {
 // console.log(objCalendar);
    

    //pega o Html da DIV
    var divElements = document.getElementById(divID).innerHTML;
    //pega o HTML de toda tag Body
    var oldPage = document.body.innerHTML;

    //Alterna o body 
    document.body.innerHTML = 
      "<html><head><title></title></head><body>" + 
      divElements + "</body>";

    //Imprime o body atual
    window.print();

    //Retorna o conteudo original da página. 
    document.body.innerHTML = oldPage;

}

var btncalendario = document.getElementById('btn-divcalendario');

btncalendario.addEventListener('click', function() {
  if(containerCalendario.style.display === 'block') {
    containerCalendario.style.display = 'none';
    containerTabela.style.display = 'block';
  } else {
    containerCalendario.style.display = 'block';
    containerTabela.style.display = 'none';
  }
});


