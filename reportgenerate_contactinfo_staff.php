<?php

require __DIR__ . "/vendor/autoload.php";

include 'database_queries.php';
include 'htmltablegenerator.php';

use Dompdf\Dompdf;

$todays_date = date("m-d-y");

$blank = "&nbsp;";

// Staff persontype code == 2 
$staffmembers = getpeople(2);

$html = '<table><tr><td>';
$html .= '<img src="biodept.png">';
$html .= '</td><td>&nbsp;</td><td><h3>Biology Department Staff Contact Information</h3><br/><h4>' . $todays_date . '</h4></td>/</tr></table>';

$html .= "<table>";
$html .= "<tr><th>Name</th><th>Email Address</th><th>Phone</th></tr>";

foreach ($staffmembers as $staffmemberkey => $staffmembervalue){

	$staffmemberemailaddresses = getpersonemailaddresses($staffmemberkey);
	$staffmemberphonenumbers = getpersonphones($staffmemberkey);

	$maxrows = max(count($staffmemberemailaddresses),
		count($staffmemberphonenumbers));

	for ($x = 0; $x <= $maxrows; $x++){

		$namevalue = $blank;
		$emailvalue = $blank;
		$phonenumbervalue = $blank;

//		Display name only in first row
		if ($x == 0) {
			$namevalue = $staffmembervalue;
		}
		
		if (count($staffmemberemailaddresses) >= $x +1) {
			$emailvalue = $staffmemberemailaddresses[$x];		
		} 
		if (count($staffmemberphonenumbers) >= $x + 1) {
			$phonenumbervalue = $staffmemberphonenumbers[$x];				
		} 

		$html .= generatehtmltablerow(array($namevalue, $emailvalue, $phonenumbervalue, $labmembervalue, $advisorvalue));
	}
}

$html .= "</table>";

//echo ($html);

$dompdf = new Dompdf(["chroot"=> __DIR__]);

$dompdf->loadHtml($html);

$dompdf->render();

$filename = "BioDB Report - Staff Contact Info - " . $todays_date . ".pdf";
$dompdf->stream($filename);
?>