<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 30/11/2018
 * Time: 11:35 PM
 */

require '../../../scripts/fpdf/fpdf.php';

require_once '../../../scripts/config.php';

class PDF extends FPDF
{
// Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../../../img/logo.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->SetFont('Arial','B',14);
        $this->Cell(30,10,'SarX Wellness Center',0,0,'C');
        $this->SetFont('Arial','',12);
        $this->Cell(10);
        $this->Cell(30,10,'Ingresos',0,0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(100,10,'Descripcion',1,0,'C');
        $this->Cell(30,10,'Cantidad',1,0,'C');
        $this->Cell(35,10,'Importe',1,0,'C');
        $this->Cell(30,10,'Cliente',1,0,'C');
        $this->Cell(30,10,'Usuario',1,0,'C');
        $this->Cell(40,10,'Fecha',1,0,'C');
        $this->Ln();
    }

    function viewTable($db){
        $fecha1=$_POST['fecha1'];
        $fecha2=$_POST['fecha2'];

        $this->SetFont('Times','',12);
        $query = "select id_ingresos,
                descripcion_ingresos,
                ingresos.id_usuario AS idingreuser,
                ingresos.id_cliente AS idingrecli,
                cantidad,
                importe,
                ingresos.fecha_modificacion AS ingrefecha,
                nombre_corto 
                from ingresos INNER JOIN usuarios on usuarios.id_usuario = ingresos.id_usuario WHERE ingresos.fecha_modificacion between '$fecha1' AND '$fecha2'";
        $result = mysqli_query($db, $query);
        while($row = mysqli_fetch_array($result)){
            $monto = $row['importe'];
            $importe = number_format($monto,2);
            $t = $row['idingrecli'];

            $this->Cell(100,10,$row['descripcion_ingresos'],1,0,'L');
            $this->Cell(30,10,$row['cantidad'],1,0,'L');
            $this->Cell(35,10,$importe,1,0,'L');

            if($t==1){
                $client="admin";
                $this->Cell(30,10,$client,1,0,'L');
            }elseif ($t==2) {
                $client = "cliente";
                $this->Cell(30, 10, $client, 1, 0, 'L');
            }
            $this->Cell(30,10,$row['nombre_corto'],1,0,'L');
            $this->Cell(40,10,$row['ingrefecha'],1,0,'L');
            $this->Ln();
        }
    }

// Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        date_default_timezone_set("America/Mexico_City");
        $date = date("d/m/Y H:i:s");
        $this->Cell(0,10,$date,0,0,'C');
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->SetTitle('SarX Wellness Center');
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();