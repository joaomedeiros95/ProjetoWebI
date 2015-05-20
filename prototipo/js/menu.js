function buttonColor(aux, sel) {//aux recebe o tipo de evento, sel recebe qual a tag a ser modificada


    if (aux == 1) {

        document.getElementById(sel).style.backgroundColor = "red";
    }
    if (aux == 2) {

        document.getElementById(sel).style.backgroundColor = "white";
    }
}


function selectButton(bt) {//bt recebe o valor da tag para modificar o valor de opção

    var aux;
    if (bt == 'a') {

        aux = "Agenda";

    }
    if (bt == 'b') {

        aux = "Consultas";

    }
    if (bt == 'c') {

        aux = "Exames";

    }

    document.getElementById("menuSelect").innerHTML = aux;//modifica o texto da tag no html
    modifica(aux);

}


function modifica(select) {
    
    var conteudo;

    if (select == "Agenda") {
        
        conteudo = "<div><?php include 'conteudoPainel.php' ?></div>";
        document.getElementById("inf").innerHTML = conteudo;

    }
    if (select == "Consultas"){
        
        conteudo ="<?php include 'conteudoConsultas.php'; ?>";
        document.getElementById("inf").innerHTML = conteudo;
    }
    if (select == "Exames") {

        conteudo = "<?php include 'conteudoExames.php'; ?>";
        document.getElementById("inf").innerHTML = conteudo;
    }

}