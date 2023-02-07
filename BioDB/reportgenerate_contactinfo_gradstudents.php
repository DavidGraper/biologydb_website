<?php

require __DIR__ . "/vendor/autoload.php";

include 'database_queries.php';
include 'htmltablegenerator.php';

use Dompdf\Dompdf;

$blank = "&nbsp;";

// Grad student persontype code == 3
$gradstudents = getpeople(3);

$html = '<table><tr><td>';
$html .= '<img src="biodept.png">';
$html .= '</td><td>&nbsp;</td><td><h3>Biology Department Graduate Student Contact Information</h3><br/><h4>Today Date</h4></td>/</tr></table>';

$html .= "<table>";
$html .= "<tr><th>Name</th><th>Email Address</th><th>Phone</th><th>Member of Lab</th><th>Advisor</th></tr>";

foreach ($gradstudents as $gradstudentkey => $gradstudentvalue){

	$gradstudentemailaddresses = getpersonemailaddresses($gradstudentkey);
	$gradstudentphonenumbers = getpersonphones($gradstudentkey);
	$gradstudentlabmemberships = getpersonlabmemberships($gradstudentkey);
	$gradstudentadvisors = getpersonadvisors($gradstudentkey);

	$maxrows = max(count($gradstudentemailaddresses),
		count($gradstudentphonenumbers),
		count($gradstudentlabmemberships),
		count($gradstudentadvisors));

	for ($x = 0; $x <= $maxrows; $x++){

		$namevalue = $blank;
		$emailvalue = $blank;
		$phonenumbervalue = $blank;
		$labmembervalue = $blank;
		$advisorvalue = $blank;

//		Display name only in first row
		if ($x == 0) {
			$namevalue = $gradstudentvalue;
		}
		
		if (count($gradstudentemailaddresses) >= $x +1) {
			$emailvalue = $gradstudentemailaddresses[$x];		
		} 
		if (count($gradstudentphonenumbers) >= $x + 1) {
			$phonenumbervalue = $gradstudentphonenumbers[$x];				
		} 
		if (count($gradstudentlabmemberships) >= $x + 1) {
			$labmembervalue = $gradstudentlabmemberships[$x];				
		}
		if (count($gradstudentadvisors) >= $x + 1) {
			$advisorvalue = $gradstudentadvisors[$x];
		}

		$html .= generatehtmltablerow(array($namevalue, $emailvalue, $phonenumbervalue, $labmembervalue, $advisorvalue));
	}
}

$html .= "</table>";

echo ($html);

//$dompdf = new Dompdf(["chroot"=> __DIR__]);
//
//$dompdf->loadHtml($html);
//
//$dompdf->render();
//
//$dompdf->stream("stream.pdf");
?>