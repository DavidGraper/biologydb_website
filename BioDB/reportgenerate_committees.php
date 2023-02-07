<?php

require __DIR__ . "/vendor/autoload.php";

include 'database_queries.php';

use Dompdf\Dompdf;

$committees = getcommitteeinfo();

$html = '<table><tr><td>';
$html .= '<img src="biodept.png">';
$html .= '</td><td>&nbsp;</td><td><h3>Biology Department Committees</h3><br/><h4>Today Date</h4></td>/</tr>';
$html .= '</table>';

$html .= "<table>";
$html .= "<tr><th>Committee</th><th>&nbsp;</th><th>Members</th></tr>";
	

$currentcommitteecategory = "";

foreach ($committees as $committee) {
	
	$committeeid = $committee->id;
	$committeecategory = $committee->committeecategory;
	$committeename = $committee->committeename;

	if ($committeecategory != $currentcommitteecategory) {
//		$html .= "<tr><td><em>" . $committeecategory . "</em></td><td>&nbsp;</td><td>&nbsp;</td></tr>";
		$html .= '<tr><td colspan="3"><em>' . $committeecategory . '</em></td></tr>';
		$html .= '<tr><td colspan="3">&nbsp;</td></tr>';
		$currentcommitteecategory = $committeecategory;
//	} else {
//		$html .= "<tr><td>" . $committeecategory . "</td><td>&nbsp;</td><td>&nbsp;</td></tr>";	
//	}
	}
		
//	$html .= "<tr><td>&nbsp;</td><td>" . $committeename . "</td><td>&nbsp;</td></tr>";
	$html .= "<tr><td>&nbsp;</td><td colspan='2'>" . $committeename . "</td></tr>";

	$committeemembers = getcommitteemembers($committeeid);

	foreach ($committeemembers as $committeemember) {





		
		$html .= "<tr><td style=width:2%'>&nbsp;</td><td style='width:3%'>&nbsp;</td><td style='width:95%'>" . $committeemember . "</td></tr>";
	}

//	Blank row
	$html .= "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
}

//$html .= "</table>";

//echo ($html);

$dompdf = new Dompdf(["chroot"=> __DIR__]);

$dompdf->loadHtml($html);

$dompdf->render();

$dompdf->stream("stream.pdf");
?>