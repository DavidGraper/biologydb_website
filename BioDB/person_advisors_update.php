<?php
  include 'db.inc.php';

  $id = $_POST['id'];
  $adviseeid = $_POST['personid'];
  $advisorid = $_POST['advisorid'];
  $startdate = $_POST['startdate'];
  $enddate = $_POST['enddate'];

  $sql = "update data_person_academicadvisors set adviseeid=$adviseeid,
  advisorid=$advisorid, startdate=";

  if (isValidDate($startdate)){
    $sql = $sql . "'$startdate',enddate=";
  } else {
    $sql = $sql . "null,enddate=";
  }

  if (isValidDate($enddate)){
    $sql = $sql . "'$enddate')";
  } else {
    $sql = $sql . "null)";
  }

  $sql = $sql . " where id=$id";

  $result = $conn->query($sql);

  header("location: person_advisees.php?personid=".$advisorid);
?>
