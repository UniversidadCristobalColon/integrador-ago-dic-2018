


/////VALIDAR RADIO NUEVO RECORD
var contar = 0;

function validar(){

    var radio =  document.querySelector('input[name="tipo"]:checked').value;


    if(radio != null){
      document.getElementById('bu').disabled=false;
    }else{
      document.getElementById('bu').disabled=true;
    }

    if(radio == 2){
      $('#r').removeClass('repeticiones');

      $('#p').addClass('peso');
      $('#u').addClass('unidad');
      $('#h').addClass('hora');
      $('#t').addClass('tiempo');
      $('#s').addClass('segundos');

    }else if(radio == 1){
      $('#p').removeClass('peso');
      $('#u').removeClass('unidad');

      $('#r').addClass('repeticiones');
      $('#h').addClass('hora');
      $('#t').addClass('tiempo');
      $('#s').addClass('segundos');
    }else if(radio == 3){
      $('#h').removeClass('hora');
      $('#t').removeClass('tiempo');
      $('#s').removeClass('segundos');

      $('#r').addClass('repeticiones');
      $('#p').addClass('peso');
      $('#u').addClass('unidad');
    }
}


//////VALIDAR CHECKBOX
      function validaCheckbox1(){
        if ($("#inlineCheckbox1").prop("checked")==true){
            $('#r').removeClass('repeticiones');
            contar++;
            if(contar != 0){
              document.getElementById('bu').disabled=false;
            }else{
              document.getElementById('bu').disabled=true;
            }
        }else{
            $('#r').addClass('repeticiones');
            contar--;
            if(contar != 0){
              document.getElementById('bu').disabled=false;
            }else{
              document.getElementById('bu').disabled=true;
            }
        }
      }

      function validaCheckbox2(){
        if ($("#inlineCheckbox2").prop("checked")==true){
            $('#p').removeClass('peso');
            $('#u').removeClass('unidad');
            contar++;
            if(contar != 0){
              document.getElementById('bu').disabled=false;
            }else{
              document.getElementById('bu').disabled=true;
            }
        }else{
            $('#p').addClass('peso');
            $('#u').addClass('unidad');
            contar--;
            if(contar != 0){
              document.getElementById('bu').disabled=false;
            }else{
              document.getElementById('bu').disabled=true;
            }
        }
      }

      function validaCheckbox3(){
       if ($("#inlineCheckbox3").prop("checked")==true){
           $('#h').removeClass('hora');
           $('#t').removeClass('tiempo');
           $('#s').removeClass('segundos');
           contar++;
           if(contar != 0){
             document.getElementById('bu').disabled=false;
           }else{
             document.getElementById('bu').disabled=true;
           }
        }else{
            $('#h').addClass('hora');
            $('#t').addClass('tiempo');
            $('#s').addClass('segundos');
            contar--;
            if(contar != 0){
              document.getElementById('bu').disabled=false;
            }else{
              document.getElementById('bu').disabled=true;
            }
        }
      }



document.addEventListener('DOMContentLoaded',function(){

///////VALIDA DATOS PERSONALES

//////TELEFONO

var telefono = document.getElementById('telefono');

if(telefono){
      telefono.addEventListener('input', function() {
      valido10 = document.getElementById('telefonoOk');

        var reg = /^([0-9]+)$/;
        var reg2 = /\s/;

        if (reg.test(telefono.value) && !reg2.test(telefono.value)) {
            valido10.style.display = 'none';

        } else if (!reg.test(telefono.value)) {
            valido10.style.display = 'block';
            valido10.className="alert alert-warning";
            valido10.innerText = "¡Solo Numeros!";

        } else if (reg2.test(telefono.value)){
          valido10.style.display = 'block';
          valido10.className="alert alert-warning";
          valido10.innerText = "¡Telefono incorrecto! Contiene espacios.";

        }
    });
}


/////////VALIDA CORREO /////
      var campo = document.getElementById('correo');
          if(campo){
                campo.addEventListener('input', function() {
                  valido = document.getElementById('emailOk');

                  var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                  var regOficial =
                  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

                  if (reg.test(campo.value) && regOficial.test(campo.value)) {
                      document.getElementById('bu').disabled=false;
                      valido.style.display = 'none';

                  } else if (reg.test(campo.value)) {
                      document.getElementById('bu').disabled=false;
                      valido.style.display = 'none';

                  } else {
                    document.getElementById('bu').disabled=true;
                    valido.className="alert alert-warning";
                    valido.style.display = 'block';
                    valido.innerText = "¡Correo incorrecto! Intenta de nuevo.";
                  }
              });
          }

//////VALIDA NUMERO /////////

      var cel = document.getElementById('celular');

      if(cel){
            cel.addEventListener('input', function() {
            valido2 = document.getElementById('celOk');

              var reg = /^([0-9]+){10}$/;
              var reg2 = /\s/;

              if (reg.test(cel.value) && !reg2.test(cel.value)) {
                  document.getElementById('bu').disabled=false;
                  valido2.style.display = 'none';

              } else if (!reg.test(cel.value)) {
                  document.getElementById('bu').disabled=true;
                  valido2.style.display = 'block';
                  valido2.className="alert alert-warning";
                  valido2.innerText = "¡El Telefono tiene que ser de 10 digitos";

              } else if (reg2.test(cel.value)){
                document.getElementById('bu').disabled=true;
                valido2.style.display = 'block';
                valido2.className="alert alert-warning";
                valido2.innerText = "¡Telefono incorrecto! Contiene espacios.";

              }
          });
      }


//////VALIDA NUMERO EMERGENCIA/////////
var numero_emergencia = document.getElementById('numero_emergencia');

if(numero_emergencia){
      numero_emergencia.addEventListener('input', function() {
      valido5 = document.getElementById('emernumOk');

        var reg = /^([0-9]+){10}$/;
        var reg2 = /\s/;

        if (reg.test(numero_emergencia.value) && !reg2.test(numero_emergencia.value)) {
            document.getElementById('bu').disabled=false;
            valido5.style.display = 'none';

        } else if (!reg.test(numero_emergencia.value)) {
            document.getElementById('bu').disabled=true;
            valido5.style.display = 'block';
            valido5.className="alert alert-warning";
            valido5.innerText = "¡El Telefono tiene que ser de 10 digitos";

        } else if (reg2.test(numero_emergencia.value)){
          document.getElementById('bu').disabled=true;
          valido5.style.display = 'block';
          valido5.className="alert alert-warning";
          valido5.innerText = "¡Telefono incorrecto! Contiene espacios.";

        }
    });
}

//////VALIDA NUMEROS FICHA MEDICA/////////

////PESO
var peso = document.getElementById('peso');

if(peso){
      peso.addEventListener('input', function() {
      valido9 = document.getElementById('pesoOk');

        var reg = /^([0-9]+)$/;
        var reg2 = /\s/;

        if (reg.test(peso.value) && !reg2.test(peso.value)) {
            document.getElementById('but').disabled=false;
            valido9.style.display = 'none';

        } else if (!reg.test(peso.value)) {
            document.getElementById('but').disabled=true;
            valido9.style.display = 'block';
            valido9.className="alert alert-warning";
            valido9.innerText = "¡Solo Numeros!";

        } else if (reg2.test(peso.value)){
          document.getElementById('but').disabled=true;
          valido9.style.display = 'block';
          valido9.className="alert alert-warning";
          valido9.innerText = "¡Peso incorrecto! Contiene espacios.";

        }
    });
}

////altura
var altura = document.getElementById('altura');

if(altura){
      altura.addEventListener('input', function() {
      valido6 = document.getElementById('alturaOk');

        var reg = /^([0-9]+)$/;
        var reg2 = /\s/;

        if (reg.test(altura.value) && !reg2.test(altura.value)) {
            document.getElementById('but').disabled=false;
            valido6.style.display = 'none';

        } else if (!reg.test(altura.value)) {
            document.getElementById('but').disabled=true;
            valido6.style.display = 'block';
            valido6.className="alert alert-warning";
            valido6.innerText = "¡Solo Numeros!";

        } else if (reg2.test(altura.value)){
          document.getElementById('but').disabled=true;
          valido6.style.display = 'block';
          valido6.className="alert alert-warning";
          valido6.innerText = "¡Altura incorrecto! Contiene espacios.";

        }
    });
}

///Cintura
var cintura = document.getElementById('cintura');

if(cintura){
      cintura.addEventListener('input', function() {
      valido7 = document.getElementById('cinturaOk');

        var reg = /^([0-9]+)$/;
        var reg2 = /\s/;

        if (reg.test(cintura.value) && !reg2.test(cintura.value)) {
            valido7.style.display = 'none';

        } else if (!reg.test(cintura.value)) {
            valido7.style.display = 'block';
            valido7.className="alert alert-warning";
            valido7.innerText = "¡Solo Numeros!";

        } else if (reg2.test(cintura.value)){
          valido7.style.display = 'block';
          valido7.className="alert alert-warning";
          valido7.innerText = "¡Cintura incorrecto! Contiene espacios.";

        }
    });
}
///IMC
var imc = document.getElementById('imc');

if(imc){
      imc.addEventListener('input', function() {
      valido8 = document.getElementById('imcOk');

        var reg = /^([0-9]+)$/;
        var reg2 = /\s/;

        if (reg.test(imc.value) && !reg2.test(imc.value)) {
            valido8.style.display = 'none';

        } else if (!reg.test(imc.value)) {
            valido8.style.display = 'block';
            valido8.className="alert alert-warning";
            valido8.innerText = "¡Solo Numeros!";

        } else if (reg2.test(imc.value)){
          valido8.style.display = 'block';
          valido8.className="alert alert-warning";
          valido8.innerText = "¡IMC incorrecto! Contiene espacios.";

        }
    });
}


});///FIN
