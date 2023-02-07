<?php

ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . "/vendor/autoload.php";

$html = "<table border='1' width='100%' style='border-collapse: collapse;'>
        <tr>
            <th>Username</th><th>Email</th>
        </tr>
        <tr>
            <td>yssyogesh</td>
            <td>yogesh@makitweb.com</td>
        </tr>
        <tr>
            <td>sonarika</td>
            <td>sonarika@makitweb.com</td>
        </tr>
        <tr>
            <td>vishal</td>
            <td>vishal@makitweb.com</td>
        </tr>
        </table>";
$filename = "newpdffile";

// include autoloader
//require_once '/dompdf/vendor/autoload.php';

//// Composer's auto-loading functionality
//require "vendor/autoload.php";

// Composer's auto-loading functionality
require "vendor/autoload.php";

// inhibit DOMPDF's auto-loader
define('DOMPDF_ENABLE_AUTOLOAD', false);

//include the DOMPDF config file (required)
require 'vendor/dompdf/dompdf/dompdf_config.inc.php';

//if you get errors about missing classes please also add:
require_once('vendor/dompdf/dompdf/include/autoload.inc.php');

//generate some PDFs!
$dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf", array("Attachment"=>0));


// reference the Dompdf namespace
//use Dompdf;

//// instantiate and use the dompdf class
//$dompdf = new DOMPF();
//
//$dompdf->loadHtml($html);
//
//// (Optional) Setup the paper size and orientation
//$dompdf->setPaper('A4', 'landscape');
//
//// Render the HTML as PDF
//$dompdf->render();
//
//// Output the generated PDF to Browser
//$dompdf->stream($filename);