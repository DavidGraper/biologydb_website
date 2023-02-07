<?php
  include 'db.inc.php';

  $id = $_POST['id'];
  $adviseeid = $_POST['adviseeid'];
  $advisorid = $_POST['personid'];
  $startdate = $_POST['startdate'];
  $enddate = $_POST['enddate'];

  $sql = "update data_person_academicadvisors set adviseeid=$adviseeid,
  advisorid=$advisorid, ";

  if ($startdate==''){
    $sql = $sql . "startdate=null, ";
  }else{
    $sql = $sql . "startdate='$startdate', ";
  }

  if ($enddate==''){
    $sql = $sql . "enddate=null ";
  }else{
    $sql = $sql . "enddate='$enddate' ";
  }

  $sql = $sql . " where id=$id";

  $result = $conn->query($sql);

  header("location: person_advisees.php?personid=".$advisorid);
?>
