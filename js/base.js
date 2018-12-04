

      function validaCheckbox1(){
        if ($("#inlineCheckbox1").prop("checked")==true){
            $('#r').removeClass('repeticiones');
        }else{
            $('#r').addClass('repeticiones');
        }
      }
      function validaCheckbox2(){
        if ($("#inlineCheckbox2").prop("checked")==true){
            $('#p').removeClass('peso');
            $('#u').removeClass('unidad');
        }else{
            $('#p').addClass('peso');
            $('#u').addClass('unidad');
        }
      }
      function validaCheckbox3(){
       if ($("#inlineCheckbox3").prop("checked")==true){
           $('#t').removeClass('tiempo');
        }else{
            $('#t').addClass('tiempo');
        }
      }

      $(document).ready(function() {
          setTimeout(function() {
              $("#anuncio").fadeOut(1500);
          },3000);
      });
