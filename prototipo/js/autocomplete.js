/**
 * Created by joao on 03/06/15.
 */

function showHint(str, campo, tipoPessoa) {
    var campoSuggestion = "suggestion_".concat(campo);
    if (str.length == 0) {
        document.getElementById(campo).value = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var sugestao = xmlhttp.responseText;
                document.getElementById(campoSuggestion).innerHTML = sugestao;
                document.getElementById(campoSuggestion).style.display = "block";
            }
        }
        xmlhttp.open("GET", "../controle/autoCompletePessoa.php?query=" + str + "&campo=" + campo + "&tipo_pessoa=" + tipoPessoa, true);
        xmlhttp.send();
    }
}

function selecionar(texto, id, campo) {
    var local = campo.id;
    if(texto != false) {
        document.getElementById(local).value = texto;
        document.getElementById(local.concat("_hidden")).value = id;
    }
    else {
        document.getElementById(local).value = '';
        document.getElementById(local.concat("_hidden")).value = 0;
    }
    document.getElementById('suggestion_'.concat(local)).style.display = "none";
}