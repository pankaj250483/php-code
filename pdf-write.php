<?php 

require_once('vendor/fpdf/html_table.php'); 

ob_end_clean();

$h="<h1>pankaj computers</h1>";
$t="<p>This is message<p><table><tr><td>hello</td><td>hello 2</td></tr></table>";

$pdf=new PDF_HTML_Table();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->WriteHTML("$h<br>$t<br>");
$pdf->Output();

// return the generated output
$pdf->Output();


?>