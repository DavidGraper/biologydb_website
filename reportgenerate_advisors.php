<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . "/vendor/autoload.php";

include 'database_queries.php';

use Dompdf\Dompdf;

$advisors = getadvisorlist2();

$html = "<html><body>";


$html .= "<head><link rel='stylesheet' href='reportsCascadeStyleSheet.css'></head>";

$html .= '<table bgcolor="purple"><tr><td>';
$html .= '<img src="biodept1.png" width=300" height="150">';

$todays_date = date("m-d-y");

$html .= '</td><td style="color:white"><h2><em>Biology Department Advisors / Advisees</em></h2><h4><em>' . $todays_date . '</em></h4></td>/</tr></table>';
$html .= '<br/>';
$html .= "<table>";
$html .= "<tr><th>Advisor</th><th>Advisee</th></tr>";

$otherrow = false;

foreach ($advisors as $advisorkey => $advisorvalue) {

	if ($otherrow == true) {
//		$html .= "<tr><td>&nbsp;</td><td>&nbsp;</td></tr>";

		$html .= "<tr>";
		$html .= "<td>";
		$html .= $advisorvalue;
		$html .= "</td>";

		$advisees = getadviseelist($advisorkey);

//	$html .= "<tr><td>" . count($advisees) . "</td><td>" . count($advisees) . "</td></tr>";

		$firstrow = true;

		foreach ($advisees as $adviseekey => $adviseevalue) {
			if ($firstrow) {
				$html .= "<td>";
				$html .= $adviseevalue;
				$html .= "</td>";
				$html .= "</tr>";
				$firstrow = false;
			} else {
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
		$otherrow = false;
	} else {
//		$html .= "<tr class='otherrow'><td>&nbsp;</td><td>&nbsp;</td></tr>";

		$html .= "<tr class='otherrow'>";
		$html .= "<td>";
		$html .= $advisorvalue;
		$html .= "</td>";

		$advisees = getadviseelist($advisorkey);

//	$html .= "<tr><td>" . count($advisees) . "</td><td>" . count($advisees) . "</td></tr>";

		$firstrow = true;

		foreach ($advisees as $adviseekey => $adviseevalue) {
			if ($firstrow) {
				$html .= "<td>";
				$html .= $adviseevalue;
				$html .= "</td>";
				$html .= "</tr>";
				$firstrow = false;
			} else {
				$html .= "<tr class='otherrow'>";
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
		$otherrow = true;
	}
}

$html .= "</table>";

//echo ($html);

$dompdf = new Dompdf(["chroot" => __DIR__]);

$dompdf->loadHtml($html);

$dompdf->render();

$filename = "BioDB Report - Advisor_Advisee Info - " . $todays_date . ".pdf";
$dompdf->stream($filename);
?>