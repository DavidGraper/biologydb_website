<?php

require __DIR__ . "/vendor/autoload.php";

//include 'reports_createadvisorlist.php';
//include 'person_advisors_createadvisorlist.php';
include 'database_queries.php';

use Dompdf\Dompdf;

$labs = getlabinfo();

$html = '<table><tr><td>';
$html .= '<img src="biodept.png">';
$html .= '</td><td>&nbsp;</td><td><h3>Biology Department Labs</h3><br/><h4>Today Date</h4></td>/</tr></table>';

$html .= "<table>";
$html .= "<tr><th>Advisor</th><th>Advisee</th></tr>";
//	
foreach ($labs as $lab){

	$html .= "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
	
	$html .= "<tr>";
	$html .= "<td>Lab Name:</td><td>&nbsp;</td><td>";
	$html .= $lab->labname;
	$html .= "</td></tr>";
	$html .= "<tr>";
	$html .= "<td>Principal Investigator:</td><td>&nbsp;</td><td>";
	$html .= $lab->pi;
	$html .= "</td></tr>";
	$html .= "<tr>";
	$html .= "<td>Website:</td><td>&nbsp;</td><td>";
	$html .= $lab->website;
	$html .= "</td></tr>";

	$labphones = getlabphones($lab->id);
	
	$firstrow = true;
	foreach ($labphones as $labphone) {
		if ($firstrow) {
			$html .= "<td>Phones:</td><td>&nbsp;</td><td>";
			$html .= $labphone;
			$html .= "</td></tr>";
			$html .= "<tr>";
			$firstrow = false;
		} else {
			$html .= "<td>&nbsp;</td><td>&nbsp;</td><td>";
			$html .= $labphone;
			$html .= "</td></tr>";
			$html .= "<tr>";
			$firstrow = false;
		}
	}

	$labrooms = getlabrooms($lab->id);
	
	$firstrow = true;
	foreach ($labrooms as $labroom) {
		if ($firstrow) {
			$html .= "<td>Rooms:</td><td>&nbsp;</td><td>";
			$html .= $labroom;
			$html .= "</td></tr>";
			$html .= "<tr>";
			$firstrow = false;
		} else {
			$html .= "<td>&nbsp;</td><td>&nbsp;</td><td>";
			$html .= $labroom;
			$html .= "</td></tr>";
			$html .= "<tr>";
			$firstrow = false;
		}
	}

	$labmembers = getlabmembers($lab->id);
	
	$firstrow = true;
	foreach ($labmembers as $labmember) {
		if ($firstrow) {
			$html .= "<td>Members:</td><td>&nbsp;</td><td>";
			$html .= $labmember;
			$html .= "</td></tr>";
			$html .= "<tr>";
			$firstrow = false;
		} else {
			$html .= "<td>&nbsp;</td><td>&nbsp;</td><td>";
			$html .= $labmember;
			$html .= "</td></tr>";
			$html .= "<tr>";
			$firstrow = false;
		}
	}	

//	Blank row
	$html .= "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";
}

$html .= "</table>";

echo ($html);

$dompdf = new Dompdf(["chroot"=> __DIR__]);

$dompdf->loadHtml($html);

$dompdf->render();

$dompdf->stream("stream.pdf");
?>