<?php 

require_once('vendor/fpdf/html_table.php'); 

ob_end_clean();

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
</tr>
<tr>
         <td>1</td>
        <td>sonu</td>
        <td>55</td>
        <td>45</td>
        <td>80</td>
        <td>76</td>
        <td>58</td>
        <td>54</td>
      </tr>
</table>";

$pdf=new PDF_HTML_Table();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->WriteHTML("$h<br>$t<br>");
$pdf->Output();

// return the generated output
$pdf->Output();


?>