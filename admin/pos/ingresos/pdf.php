<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 30/11/2018
 * Time: 11:35 PM
 */

require_once('../../../scripts/TCPDF-master/tcpdf.php');
require_once ('../../../scripts/config.php');


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetAuthor('Solicitud de Ingresos');
$pdf->SetTitle('SarX Wellness Center');
$pdf->SetSubject('');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

$query="select id_ingresos,
                descripcion_ingresos,
                ingresos.id_usuario AS idingreuser,
                ingresos.id_cliente AS idingrecli,
                cantidad,
                importe,
                ingresos.fecha_modificacion AS ingrefecha,
                nombre_corto 
                from ingresos INNER JOIN usuarios on usuarios.id_usuario = ingresos.id_usuario WHERE ingresos.fecha_modificacion between '$fecha1' AND '$fecha2'";

$pdf->AddPage('L');

$pdf->Cell(0,0,"SarX Wellness Center");

$result=mysqli_query($db,$query);

$html="<table>
            <thead>
            <tr>
                <th><b>Descripción</b></th>
                <th><b>Cantidad</b></th>
                <th><b>Importe</b></th>
                <th><b>Cliente</b></th>
                <th><b>Usuario</b></th>
                <th><b>Fecha</b></th>
            </tr>
            </thead>
            <tbody>";

while ($row=mysqli_fetch_array($result)) {
    $id = $row['id_ingresos'];
    $descripcion = $row['descripcion_ingresos'];
    $user = $row['idingreuser'];
    $cliente = $row['idingrecli'];
    $monto = $row['importe'];
    $importe = number_format($monto,2);
    $cantidad = $row['cantidad'];
    $fecha = $row['ingrefecha'];
    $usuario = $row['nombre_corto'];


    $html .= "<tr>
                    <td>$descripcion</td>
                    <td>$cantidad</td>
                    <td>$importe</td>
                    <td>$cliente</td>
                    <td>$usuario</td>
                    <td>$fecha</td>
                </tr>";
}

$html .= "</tbody></table>";
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, 'l');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output("ingresos.pdf", 'I');

//============================================================+
// END OF FILE
//============================================================+
