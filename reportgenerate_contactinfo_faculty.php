<?php

require __DIR__ . "/vendor/autoload.php";

include 'database_queries.php';
include 'htmltablegenerator.php';

use Dompdf\Dompdf;

$todays_date = date("m-d-y");

$blank = "&nbsp;";

// Faculty persontype code == 1
$facultymembers = getpeople(1);

$html = '<table><tr><td>';
$html .= '<img src="biodept.png">';
$html .= '</td><td>&nbsp;</td><td><h3>Biology Department Faculty Contact Information</h3><br/><h4>' . $todays_date . '</h4></td>/</tr></table>';

$html .= "<table>";
$html .= "<tr><th>Name</th><th>Email Address</th><th>Phone</th></tr>";

foreach ($facultymembers as $facultymemberkey => $facultymembervalue){

	$facultymemberemailaddresses = getpersonemailaddresses($facultymemberkey);
	$facultymemberphonenumbers = getpersonphones($facultymemberkey);

	$maxrows = max(count($facultymemberemailaddresses),
		count($facultymemberphonenumbers));

	for ($x = 0; $x <= $maxrows; $x++){

		$namevalue = $blank;
		$emailvalue = $blank;
		$phonenumbervalue = $blank;

//		Display name only in first row
		if ($x == 0) {
			$namevalue = $facultymembervalue;
		}
		
		if (count($facultymemberemailaddresses) >= $x +1) {
			$emailvalue = $facultymemberemailaddresses[$x];		
		} 
		if (count($facultymemberphonenumbers) >= $x + 1) {
			$phonenumbervalue = $facultymemberphonenumbers[$x];				
		} 

		$html .= generatehtmltablerow(array($namevalue, $emailvalue, $phonenumbervalue, $labmembervalue, $advisorvalue));
	}
}

$html .= "</table>";

//echo ($html);

$dompdf = new Dompdf(["chroot"=> __DIR__]);

$dompdf->loadHtml($html);

$dompdf->render();

$filename = "BioDB Report - Faculty Contact Info - " . $todays_date . ".pdf";
$dompdf->stream($filename);
?>