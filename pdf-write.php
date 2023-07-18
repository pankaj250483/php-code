<?php 

require_once('vendor/fpdf/html_table.php'); 
require 'connect.php';
ob_end_clean();

$sql = "SELECT * FROM computers";
$result = $conn->query($sql);
$h="<h1>pankaj computers</h1>";
$t="<p>STUDENT MARKSHEET<p>
<table>
<tr>
<td>Rollno</td>
<td>Name</td>
<td>english</td>
<td>math</td>
<td>hindi</td>
<td>science</td>
<td>punjabi</td>
<td>gk</td>
</tr>";

while($row_data = $result->fetch_assoc()) {
  $col = 0;
  $t.="<tr>";
  foreach($row_data as $key=>$value) {
    $t.="<td>$value</td>"; 
  }
  $t.="</tr>";
}

$t.="</table>";

$pdf=new PDF_HTML_Table();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->WriteHTML("$h<br>$t<br>");
$pdf->Output();

// return the generated output
$pdf->Output();


?>