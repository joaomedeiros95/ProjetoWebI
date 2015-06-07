function buttonColor(aux, sel) {//aux recebe o tipo de evento, sel recebe qual a tag a ser modificada


    if (aux == 1) {

        document.getElementById(sel).style.backgroundColor = "#ff776f";
    }
    if (aux == 2) {

        document.getElementById(sel).style.backgroundColor = "white";
    }
}


function selectButton(bt) {//bt recebe o valor da tag para modificar o valor de opção
    var aux;
    if (bt == 'a') {
        aux = "Agenda";
        $(".consulta").addClass("noVisible");
        $(".exame").addClass("noVisible");
        $(".agenda").removeClass("noVisible");
    }
    if (bt == 'b') {
        aux = "Consultas";
        $(".consulta").removeClass("noVisible");
        $(".exame").addClass("noVisible");
        $(".agenda").addClass("noVisible");
    }
    if (bt == 'c') {
        aux = "Exames";
        $(".consulta").addClass("noVisible");
        $(".exame").removeClass("noVisible");
        $(".agenda").addClass("noVisible");
    }
    document.getElementById("menuSelect").innerHTML = aux;//modifica o texto da tag no html
}

$('#open_dialog').click(function (event) {
    
    //o que será exibido na dialog
    var dialog_html = '<div id="dialog_body">' + 
        '<form>'+
        'Nome: <input id="nome" type="text" name="test1"/>' +
        'Data: <input id="data" type="text" name="test2"/>' +
        'Medico: <input id="data" type="text" name="test3"/>' +
        '<input type="submit" name="teste4" value="Enviar"/>'+  
        '</form>'+
        '</div>';
    
    //configurações da dialog
    $(dialog_html).dialog({
		
        title: 'Marcar Consulta',
        height: 350,
        width: 300,
        modal: 'true',
        close: function () {
            $(this).remove();
        }
    });
    
    //dialog input click
    
    //$('input[name=test1]').click(function (event) {
          //document.getElementById('rnome').value = 
    //});
    //$('input[name=test2]').click(function (event) {
          //document.getElementById()
    //});
     //$('input[name=test3]').click(function (event) {
          //document.getElementById()
    //});
});