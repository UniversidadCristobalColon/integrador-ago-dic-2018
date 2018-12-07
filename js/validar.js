$(document).ready(function() {
    //variables
    var contrasena = $('[name=contrasena]');
    var contrasena2 = $('[name=contrasena2]');
    var confirmacion = "Las contraseñas si coinciden";
    var longitud = "La contraseña debe estar formada entre 5-10 carácteres (ambos inclusive)";
    var negacion = "No coinciden las contraseñas";
    var vacio = "La contraseña no puede estar vacía";
    //oculto por defecto el elemento span
    var span = $('<span></span>').insertAfter(contrasena2);
    span.hide();
    //función que comprueba las dos contraseñas
    function coincidePassword(){
        var valor1 = contrasena.val();
        var valor2 = contrasena2.val();
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
    contrasena2.keyup(function(){
        coincidePassword();
    });
});

function validar() {
    var contrasena = $('[name=contrasena]');
    var contrasena2 = $('[name=contrasena2]');

    var valor1 = contrasena.val();
    var valor2 = contrasena2.val();

    if (valor1.length<5){
        alert("La contraseña debe ser al menos de 6 o más caracteres");
        return false;
    }
    if (valor1!=valor2){
        alert("La contraseña y su confirmación no coinciden");
        return false;
    }

    return true;
}