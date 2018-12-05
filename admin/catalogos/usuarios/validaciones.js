document.addEventListener('DOMContentLoaded',function(){


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

});///FIN