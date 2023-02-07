<?php
  include 'db.inc.php';

  $personid = $_POST['personid'];
  $institution = $_POST['institution'];
  $gradyear = $_POST['gradyear'];
  $degree = $_POST['degree'];

  $sql = "insert into data_person_education (personid,
  institution,
  degree, 
  gradyear)
  values
  ($personid,
  '$institution',
  '$degree', 
  '$gradyear')";

  $conn->query($sql);
  header("location: person_education.php?personid=$personid");
?>
