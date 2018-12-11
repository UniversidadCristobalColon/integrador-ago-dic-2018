
    function agregarRecord(datos_record){

        d=datos_record.split('||');

        $('#record_nombre').text(d[0]);

        $('#record_puntaje').val(d[1]);

        //nivel
        if(d[2]=='Principiante'){
            $("#recordnivel option:eq(1)").prop("selected",true);
        }else if(d[2]=='Intermedio') {
            $("#recordnivel option:eq(2)").prop("selected",true);
        }else if(d[2]=='Avanzado') {
            $("#recordnivel option:eq(3)").prop("selected",true);
        }else{
            $("#recordnivel option:eq(0)").prop("selected",true);
        }

        //id_tipo_record
        $('#recordid').val(d[3]);

        $('#recordnota').val(d[4]);

        //id del usuario
        $('#recordiduser').val(d[5]);

        //id clase
        $('#recordclase').val(d[6]);
        //id unidad peso
        $('#recordunidad_peso').val(d[7]);

        //id unidad puntos
        $('#recordunidad_puntos').val(d[8]);

        //fecha_clase
        $('#recordfecha').val(d[9]);


    };
