<?php
    header('Content-Type: application/json');
    /*$pdo= new PDO("mysql:dbname=sarx_db;host=35.225.5.28","sarx_user","oBSH6d4RicpMR8Ja");

    $senSQL= $pdo -> prepare("SELECT * FROM clases");
    $senSQL-> execute();

    $resultado= $senSQL -> fetchAll(PDO::FETCH_ASSOC);*/

    $sqlclass="";

    $eventos[0]["title"] = 'evento 1';
    $eventos[0]["start"] = ' 2018-11-25';

    $eventos[1]["title"] = 'evento 2';
    $eventos[1]["start"] = ' 2018-11-22';

    $eventos[2]["title"] = 'evento 3';
    $eventos[2]["start"] = ' 2018-11-27';




    /*$sql="SELECT id_disciplina, nombre_disciplina FROM disciplinas";
      $resul=$db->query($sql);
      $html="<option value='0'>Elige una disciplina...</option>";
      while ($rowm=mysqli_fetch_array($resul))
      {
        $html.="<option value='".$rowm['id_disciplina']."'>".$rowm['nombre_disciplina']."</option>";
      }
      echo $html;*/


    ECHO json_encode($eventos);
?>
