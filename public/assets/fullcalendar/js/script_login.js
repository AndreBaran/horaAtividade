


$(function () {



    $.getJSON(routeDataset('routeLoadEscola'), function (dados) {
        console.log(dados);
        if (dados.length > 0) {
            var option = '';
            option += '<option value=""></option>';
            $.each(dados, function (i, obj) {
                option += '<option value="' + obj.id + '">' + obj.name + '</option>';
            })
            $('#escola_id').html(option).show();
        } else {
            Reset();
            $('#mensagem').html('<span class="mensagem">Não foram encontrados Escolas!</span>');
        }
    });

})

//let objCalendar;





function routeDataset(route) {
    return document.getElementById('geral_dataset').dataset[route];
}






