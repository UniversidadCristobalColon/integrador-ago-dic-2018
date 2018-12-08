<?php

    # Retorna la fecha en formato de: 03 de Diciembre de 2018
    function fecha_larga($fecha){
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
            "Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $dia = date('d',strtotime($fecha));
        $mes = $meses[date('m',strtotime($fecha))-1];
        $anio = date('Y',strtotime($fecha));

        $fecha = $dia." de ".$mes." de ".$anio;

        return $fecha;
    }