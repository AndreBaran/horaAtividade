


$(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.getJSON(routeAtividades_msgPen('routeMensagemPendentes'), function (dados) {
        console.log(dados);
        var option = '';
        if (dados.length > 0) {            
            option ='Mensagens <span id="pendente" name="pendente" class="badge badge-light">'+dados.length+'</span>';            
        } else {
            option ='Mensagens <span id="pendente" name="pendente" class="badge badge-light">'+0+'</span>';
        }
        $('#msg').html(option).show();
    });

})

function routeAtividades_msgPen(route) {
    return document.getElementById('mensagem_dataset_pen').dataset[route];
}








