$(function(){
	var shrinkHeader = 100;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('.logo-header').addClass('shrink');
           $('.nome-logo').addClass('shrink');
        }
        else {
            $('.logo-header').removeClass('shrink');
            $('.nome-logo').removeClass('shrink');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset;
    }
});


function formatarInteiros(campo) {
    if(isNaN(parseInt(campo.value))) {
        campo.value = campo.value.substring(0, campo.value.length - 1);
        return false;
    } else if (parseInt(campo.value) != campo.value) {
        campo.value = campo.value.substring(0, campo.value.length - 1);
        return false;
    }

    return true;
}

//valida numero inteiro com mascara
function validarInteiroData(campo){
    if(isNaN(parseInt(campo.value))) {
        campo.value = campo.value.substring(0, campo.value.length - 1);
        return false;
    } else if (parseInt(campo.value) != campo.value) {
        if(campo.value.substring(campo.value.length - 1, campo.value.length) != '/' && isNaN(campo.value.substring(campo.value.length - 1, campo.value.length)))
            campo.value = campo.value.substring(0, campo.value.length - 1);
        return false;
    }
    return true;
}

function formatarData(campo) {
    if(validarInteiroData(campo)==false){
        event.returnValue = false;
    }
    formataCampo(campo, '00/00/0000', event);
}

function formataCampo(campo, Mascara, evento) {
    var boleanoMascara;

    var Digitato = evento.keyCode;
    var exp = /\-|\.|\/|\(|\)| /g
    var campoSoNumeros = campo.value.toString().replace( exp, "" );

    var posicaoCampo = 0;
    var NovoValorCampo="";
    var TamanhoMascara = campoSoNumeros.length;;

    if (Digitato != 8) { // backspace
        for(i=0; i<= TamanhoMascara; i++) {
            boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
            || (Mascara.charAt(i) == "/"))
            boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(")
            || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "))
            if (boleanoMascara) {
                NovoValorCampo += Mascara.charAt(i);
                TamanhoMascara++;
            }else {
                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                posicaoCampo++;
            }
        }
        campo.value = NovoValorCampo;
        return true;
    }else {
        return true;
    }
}