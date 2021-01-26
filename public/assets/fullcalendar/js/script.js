

$(function () {

    $('.date-time').mask('00/00/0000 00:00:00');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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

        let id = $("#modalCalendar input[name='id']").val();

        let title = $("#modalCalendar input[name='title']").val();

        let start = moment($("#modalCalendar input[name='start']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");

        let end = moment($("#modalCalendar input[name='end']").val(), "DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");

        let color = $("#modalCalendar input[name='color']").val();

        let Event = {
            title: title,
            start: start,
            end: end,
            color: color,
        };
        let route;

        if (id == '') {
            route = routeAtividades('routeAtividadeAdd');
        } else {
            route = routeAtividades('routeAtividadeUpdate');
            Event.id = id;
            Event._method = 'PUT';
        }

        sendAtividade(route, Event);
    });
})

function sendAtividade(route, data_) {
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
                location.reload();
            }
        },
        error: function (json) {

            console.log('-------------');
            console.log(json);
            console.log('-------------');
            let responseJSON = json.responseJSON.errors;

             $(".message").html(loadErrors(responseJSON));
        }
    });
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

function resetForm(form) {
    $(form)[0].reset();
}

