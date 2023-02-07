<?php include 'db.inc.php'; include 'validation.functions.php';

  $personid = $_POST['personid'];
  $ethnicityid = $_POST['ethnicityid'];

  $sql = "insert into data_person_ethnicities (personid, ethnicityid) values ($personid, $ethnicityid)";

  $conn->query($sql); header("location:person_ethnicities.php?personid=$personid"); ?>
