<?php

include 'db.inc.php';
include 'validation.functions.php';

$personid = $_POST['personid'];
$committeeid = $_POST['committeeid'];
$committeechair = $_POST['committeechair'];

$chairvalue = 0;
if ($committeechair == "on") {
	$chairvalue = 1;
}

$sql = "insert into data_person_committees (personid, committeeid, chair) values ($personid, $committeeid, $chairvalue)";

echo($sql);

$conn->query($sql);
header("location:person_committees.php?personid=$personid");
?>
