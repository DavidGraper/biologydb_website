<?php include 'db.inc.php'; include 'validation.functions.php';

  $personid = $_POST['personid'];
  $jobtitleid = $_POST['jobtitleid'];
  $startdate = $_POST['startdate'];
  $enddate = $_POST['enddate'];

$sql = "insert into data_person_biologydeptjobtitles (personid, biologyjobtitleid,
  startdate, enddate) values ($personid, $jobtitleid,";

if (isValidDate($startdate)) {
	$sql = $sql . "'$startdate',";
} else {
	$sql = $sql . "null,";
}

if (isValidDate($enddate)) {
	$sql = $sql . "'$enddate')";
} else {
	$sql = $sql . "null)";
}

//echo($sql);

$conn->query($sql);
header("location:person_biologyjobtitles.php?personid=$personid");
?>
