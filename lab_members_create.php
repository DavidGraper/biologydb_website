<?php
  include 'db.inc.php';
  include 'validation.functions.php';

  $personid = $_POST['personid'];
  $labid = $_POST['labid'];
  $labroleid = $_POST['labroleid'];

  $sql = "insert into data_lab_persons (labid,
  personid,
  labroleid)
  values
  ($labid, $personid, $labroleid)";

  echo $sql;

  $conn->query($sql);

  header("location: lab_members.php?labid=$labid");
?>
