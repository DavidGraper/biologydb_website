<?php
  include 'db.inc.php';

  $personid = $_POST['personid'];
  $institution = $_POST['institution'];
  $degree = $_POST['degree'];

  $sql = "insert into data_person_education (personid,
  institution,
  degree)
  values
  ($personid,
  '$institution',
  '$degree')";

  $conn->query($sql);
  header("location: person_education.php?personid=$personid");
?>
