<?php
  include 'db.inc.php';

  $id = $_POST['id'];
  $personid = $_POST['personid'];
  $institution = $_POST['institution'];
  $degree = $_POST['degree'];

  $sql = "update data_person_education set personid='$personid',
  institution='$institution',
  degree='$degree' where id=$id";

  $result = $conn->query($sql);

  header("location: person_education.php?personid=".$personid);
?>
