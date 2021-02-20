
var botao = document.getElementById("mensagem");
botao.addEventListener("mensagem",  function () {
  console.log('testeeee');
  //$("#modalMensagem").modal('show');
  console.log($("#modalMensagem"));
  console.log('teste');
});



$(function () {

    $('.date-time').mask('00/00/0000 00:00:00');
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.getJSON(routeAtividades_msg('routeLoadProfessores'), function (dados) {
       // console.log(dados);
        if (dados.length > 0) {
            var option = '';
            option += '<option value=""></option>';
            $.each(dados, function (i, obj) {
                option += '<option value="' + obj.id + '">' + obj.name + '</option>';
            })
            $('#cmbProfessor_msg').html(option).show();
        } else {
            Reset();
            $('#mensagem').html('<span class="mensagem">Não foram encontrados Professores!</span>');
        }
    });

  

    $.getJSON(routeAtividades_msg('routeLoadTipos'), function (dados) {
        console.log(dados);
        if (dados.length > 0) {
            var option = '';
            option += '<option value=""></option>';
            $.each(dados, function (i, obj) {
                option += '<option value="' + obj.id + '">' + obj.name + '</option>';
            })
            $('#cmbAtividade_msg').html(option).show();
        };
    });


    $(".saveEvent_msg").click(function () {
        let professor = $("#cmbProfessor_msg option:selected").text();
        console.log(professor);
        let idProfessor = $("#cmbProfessor_msg option:selected").val();
        console.log(idProfessor);

        let Atividade = $("#cmbAtividade_msg option:selected").text();
        console.log(Atividade);
        let idAtividade = $("#cmbAtividade_msg option:selected").val();
        console.log(idAtividade);
        let start = moment($("#modalMensagem input[name='start_msg']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");
        console.log($("#modalMensagem input[name='start_msg']").val());
        console.log(start);
        let end = moment($("#modalMensagem input[name='end_msg']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");
        console.log($("#modalMensagem input[name='end_msg']").val());
        console.log(end);
        let mensagem = $("#modalMensagem textarea[name='mensagem_text_msg']").val();
        console.log(mensagem);
        let status = $("#status_msg option:selected").val();
        console.log(status);
        console.log("aaaaaaaaaa");
        console.log(routeTeste_msg(''));

        let tipoAtividade =getTipoAtividade_msg(routeAtividades_msg('routeLoadInfotipos'),idAtividade);
        let color = tipoAtividade.color;//$("#modalCalendar input[name='color']").val();

        let id = $("#modalMensagem input[name='id_msg']").val();

        let descricao = professor+' '+Atividade;
        console.log('a');
        let Msg = {
            title: descricao,
            start: start,
            end: end,
            mensagem: mensagem,
            status: status,
            color: color,
            //extendedProps.event.professor_id=idProfessor,
            professor_id: idProfessor,
            tipoatividade_id: idAtividade,
        };
        console.log('b');
        let route;
        console.log(id);
        if (id == '') {
            console.log('**********');
            console.log('c');
        } else {
            console.log('-------------');
            console.log('d');
        }

        if (id == '') {
            route = routeAtividades_msg('routeMensagemAdd');
        } else {
            route = routeAtividades_msg('routeMensagemUpdate');
            Msg.id = id;
            console.log('Msg.id');
            console.log(Msg.id);
            Msg._method = 'PUT';
        }
        console.log(route);
        console.log('-------------');

        console.log('-------------');

        sendAtividade_msg(route, Msg);
    });

    $(".deleteEvent_msg").click(function () {

        let id = $("#modalMensagem input[name_msg='id']").val();

        let Atividade = {
            id: id,
            _method: 'DELETE'
        };

        let route = routeAtividades_msg('routeMensagemDestroy');
        console.log('-------------');
        console.log(route);
        console.log('-------------');
        sendAtividade_msg(route, Atividade);

    });
   
   


})




//let objCalendar;

function sendAtividade_msg(route, data_) {
    console.log('***************');
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
                //console.log(location);
                //$('#calendario').load(location.href +  '#calendario');
                location.reload();
            }
        },
        error: function (json) {

            console.log('***************');
            console.log(json.responseJSON);
            console.log('***************');
            let responseJSON = json.responseJSON.errors;

            $(".message").html(loadErrors_msg(responseJSON));
        }
    });
}

function getTipoAtividade_msg(route, data_) {
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

function getAtividadesWeek_msg(route, data_) {
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

function loadErrors_msg(response) {

    let boxAlert = `<div class="alert alert-danger">`;

    for (let fields in response) {
        boxAlert += `<span>${response[fields]}</span><br/>`;
    }

    boxAlert += `</div>`;

    return boxAlert.replace(/\,/g, "<br/>");
}

function clearMessages_msg(element) {
    $(element).text('');
}

//function routeAtividades(route) {
    //return document.getElementById('calendar').dataset[route];
//}

//function routeTeste(route) {
//    return document.getElementById('calendar').dataset;
//}

function resetForm_msg(form) {
    $(form)[0].reset();
}

var btntabela = document.getElementById('btn-divtabela');
var containerTabela = document.querySelector('.containerTabela');


function openModal_msg(divID,reg) {
  if (reg != '') 
  {
    console.log('teste'); 
   //   $data = json_decode(reg);
     var msgObj =   jQuery.parseJSON(reg);
    console.log(msgObj.id); 
    console.log('reg'); 
    console.log(reg); 
    $("#modalMensagem input[name='id_msg']").val(msgObj.id);
    let start = moment(msgObj.start).format("DD/MM/YYYY HH:mm:ss");;
    $("#modalMensagem input[name='start_msg']").val(start);
    let end = moment(msgObj.end).format("DD/MM/YYYY HH:mm:ss");;
    $("#modalMensagem input[name='end_msg']").val(end);
    $("#modalMensagem input[name='color_msg']").val(msgObj.color);
    $("#modalMensagem select[name='cmbProfessor_msg']").val(msgObj.professor_id);    
    $("#modalMensagem select[name='cmbAtividade_msg']").val(msgObj.tipoatividade_id);
    $("#modalMensagem select[name='status_msg']").val(msgObj.status);
    $("#modalMensagem textarea[name='mensagem_text_msg']").text(msgObj.mensagem);
    


  } 
  //console.log(id);
 $("#modalMensagem").modal('show');

    //pega o Html da DIV

}

function routeAtividades_msg(route) {
    return document.getElementById('mensagem_dataset').dataset[route];
}

function routeTeste_msg(route) {
    return document.getElementById('mensagem_dataset').dataset;
}






