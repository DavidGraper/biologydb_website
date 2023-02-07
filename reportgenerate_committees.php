<?php

require __DIR__ . "/vendor/autoload.php";

include 'database_queries.php';

use Dompdf\Dompdf;

$todays_date = date("m-d-y");

$committees = getcommitteeinfo();

$html = '<table><tr><td>';
$html .= '<img src="biodept.png">';
$html .= '</td><td>&nbsp;</td><td><h3>Biology Department Committees</h3><br/><h4>' . $todays_date .'</h4></td>/</tr>';
$html .= '</table>';
$html .= "<table>";

$currentcommitteecategory = "";

foreach ($committees as $committee) {
	
	$committeeid = $committee->id;
	$committeetype = $committee->committeetype;
	$committeename = $committee->committeename;

	if ($committeetype != $currentcommitteetype) {
		$html .= '</table><br/><br/><table frame="box">';
		$html .= '<tr><td colspan="3"><em><b>' . $committeetype . '</b></em></td></tr>';
		$html .= '<tr><td colspan="3">&nbsp;</td></tr>';
		$currentcommitteetype = $committeetype;
	}
		
	$html .= "<tr><td>&nbsp;</td><td colspan='2'><em><u>" . $committeename . "</u></em></td></tr>";

	$committeemembers = getcommitteemembers($committeeid);

	foreach ($committeemembers as $committeemember) {
		$html .= "<tr><td style=width:2%'>&nbsp;</td><td style='width:3%'>&nbsp;</td><td style='width:95%'>" . $committeemember . "</td></tr>";
	}

	$html .= "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
}

$html .= "</table>";

//echo ($html);

$dompdf = new Dompdf(["chroot"=> __DIR__]);

$dompdf->loadHtml($html);

$dompdf->render();

$filename = "BioDB Report - Committees - " . $todays_date . ".pdf";
$dompdf->stream($filename);
?>