<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 23/11/2018
 * Time: 06:46 PM
 */

require_once('../../../scripts/TCPDF-master/tcpdf.php');
require_once ('../../../scripts/config.php');


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetAuthor('Solicitud de Egresos');
$pdf->SetTitle('SarX Wellness Center');
$pdf->SetSubject('');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

$query="select id_egresos,
                descripcion_egresos,
                egresos.id_usuario AS idegreuser,
                importe,
                egresos.fecha_modificacion AS egrefecha,
                nombre_corto 
                from egresos INNER JOIN usuarios on usuarios.id_usuario = egresos.id_usuario WHERE egresos.fecha_modificacion between '$fecha1' AND '$fecha2'";


$result=mysqli_query($db,$query);
while ($row=mysqli_fetch_array($result)) {
    $id = $row['id_egresos'];
    $descripcion = $row['descripcion_egresos'];
    $user = $row['idegreuser'];
    $monto = $row['importe'];
    $importe = number_format($monto,2);
    $fecha = $row['egrefecha'];
    $usuario = $row['nombre_corto'];

// add a page
        $pdf->AddPage('L');

        $html = "<table cellpadding='1' cellspacing='1' border='0' style='text-align:right;'>
        <tr>
            <th><img src='../../../img/favicon.png' alt='test alt attribute' width='150' height='100' border='0' /></th>
            <th><b>SarX Wellness Center</b></th>
            <th></th>
        </tr>
        <tr>
            <th></th>
            <th><b>Reporte de egresos</b></th>
        </tr>
    </table>
    <br>
    <br>
    <table cellpadding='1' cellspacing='1' border='1' style='text-align:center;'>
            <thead>
            <tr>
                <th><b>Descripción</b></th>
                <th><b>Usuario</b></th>
                <th><b>Importe</b></th>
                <th><b>Fecha</b></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>$descripcion</td>
                    <td>$usuario</td>
                    <td>$importe</td>
                    <td>$fecha</td>
                </tr>
            </tbody>
        </table>
    ";
    }
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, 'l');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output("egresos.pdf", 'I');

//============================================================+
// END OF FILE
//============================================================+

