<?php

include 'db.inc.php';
include 'validation.functions.php';

$personid = $_POST['personid'];
$biologydegreeareaid = $_POST['biologydegreeareaid'];
$biologydegreetypeid = $_POST['biologydegreetypeid'];
$startingsemesterid = $_POST['startingsemesterid'];
$enddate = $_POST['enddate'];

$sql = "insert into data_person_biologydegreeareas (personid, biologydegreeareaid,
  biologydegreetypeid, startingsemesterid, enddate) values ($personid, $biologydegreeareaid,
  $biologydegreetypeid, $startingsemesterid, ";

if (isValidDate($enddate)) {
	$sql = $sql . "'$enddate')";
} else {
	$sql = $sql . "null)";
}

$conn->query($sql);
header("location:person_biologydegrees.php?personid=$personid");

?>
