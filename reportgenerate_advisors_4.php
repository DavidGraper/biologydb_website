<?php

require __DIR__ . "/vendor/autoload.php";

include 'database_queries.php';

use Dompdf\Dompdf;

$advisors = getadvisorlist2();

$html = '<table><tr><td>';
$html .= '<img src="biodept.png">';
$html .= '</td><td>&nbsp;</td><td><h3>Biology Department Advisors / Advisees</h3><br/><h4>Today Date</h4></td>/</tr></table>';

$html .= "<table>";
$html .= "<tr><th>Advisor</th><th>Advisee</th></tr>";
	
foreach ($advisors as $advisorkey => $advisorvalue){

	$html .= "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
	
	$html .= "<tr>";
	$html .= "<td>";
	$html .= $advisorvalue;
	$html .= "</td>";


	$advisees = getadviseelist($advisorkey);

//	$html .= "<tr><td>" . count($advisees) . "</td><td>" . count($advisees) . "</td></tr>";

	$firstrow = true;
	
	foreach ($advisees as $adviseekey => $adviseevalue){
		if ($firstrow){
		$html .= "<td>";
		$html .= $adviseevalue;
		$html .= "</td>";
		$html .= "</tr>";	
		$firstrow = false;
		}
		else {
		$html .= "<tr>";
		$html .= "<td>";
		$html .= "&nbsp;";
		$html .= "</td>";
		$html .= "<td>";
		$html .= $adviseevalue;
		$html .= "</td>";
		$html .= "</tr>";
		}
	}

	$html .= "</tr>";
}

$html .= "</table>";

//echo ($html);

$dompdf = new Dompdf(["chroot"=> __DIR__]);

$dompdf->loadHtml($html);

$dompdf->render();

$dompdf->stream("stream.pdf");
?>