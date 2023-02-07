<?php
  include 'db.inc.php';
  include 'validation.functions.php';

  $personid = $_POST['personid'];
  $adviseeid = $_POST['adviseeid'];
  $startdate = $_POST['startdate'];
  $enddate = $_POST['enddate'];

  $sql = "insert into data_person_academicadvisors (advisorid,
  adviseeid,
  startdate,
  enddate)
  values
  ($personid,
   $adviseeid,";

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

  echo $sql;

  $conn->query($sql);

  header("location: person_advisees.php?personid=$personid");
?>
