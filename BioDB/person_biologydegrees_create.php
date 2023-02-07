<?php include 'db.inc.php'; include 'validation.functions.php';

  $personid = $_POST['personid'];
  $biologydegreeareaid = $_POST['biologydegreeareaid'];
  $biologydegreetypeid = $_POST['biologydegreetypeid'];
  $startdate = $_POST['startdate'];
  $enddate = $_POST['enddate'];

  $sql = "insert into data_person_biologydegreeareas (personid, degreeareaid,
  degreetypeid, startdate, enddate) values ($personid, $biologydegreeareaid,
  $biologydegreetypeid,";

  if (isValidDate($startdate)){
    $sql = $sql . "'$startdate',";
  } else {
    $sql = $sql . "null,";
  }

  if (isValidDate($enddate)){
    $sql = $sql . "'$enddate')";
  } else {
    $sql = $sql . "null)";
  }

  $conn->query($sql); header("location:person_biologydegrees.php?personid=$personid"); ?>
