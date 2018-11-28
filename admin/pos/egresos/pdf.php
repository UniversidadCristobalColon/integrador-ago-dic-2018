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

$query="select * from egresos";
$result=mysqli_query($db,$query);
while ($row=mysqli_fetch_array($result)) {
    $id = $row['id_egresos'];
    $descripcion = $row['descripcion_egresos'];
    $user = $row['id_usuario'];
    $importe = $row['importe'];
    $fecha = $row['fecha_modificacion'];

// add a page
    $pdf->AddPage();

    $html = "Hola";
    }
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output("egresos.pdf", 'I');

//============================================================+
// END OF FILE
//============================================================+

