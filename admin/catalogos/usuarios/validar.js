$(document).ready(function() {
    //variables
    var contraseña = $('[name=contraseña]');
    var contraseña2 = $('[name=contraseña2]');
    var confirmacion = "Las contraseñas si coinciden";
    var longitud = "La contraseña debe estar formada entre 5-10 carácteres (ambos inclusive)";
    var negacion = "No coinciden las contraseñas";
    var vacio = "La contraseña no puede estar vacía";
    //oculto por defecto el elemento span
    var span = $('<span></span>').insertAfter(contraseña2);
    span.hide();
    //función que comprueba las dos contraseñas
    function coincidePassword(){
        var valor1 = contraseña.val();
        var valor2 = contraseña2.val();
        //muestro el span
        span.show().removeClass();
        //condiciones dentro de la función
        if(valor1 != valor2){
            span.text(negacion).addClass('negacion');
        }
        if(valor1.length==0 || valor1==""){
            span.text(vacio).addClass('negacion');
        }
        if(valor1.length<5 || valor1.length>10){
            span.text(longitud).addClass('negacion');
        }
        if(valor1.length!=0 && valor1==valor2){
            span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
        }
    }
    //ejecuto la función al soltar la tecla
    contraseña2.keyup(function(){
        coincidePassword();
    });
});