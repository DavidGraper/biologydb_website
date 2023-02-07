<?php
  include 'db.inc.php';

  $personid = $_GET['personid'];
  $id = $_GET['id'];

  $sql = "delete from data_person_academicadvisors where id=$id";
  $conn->query($sql);
  header("location: person_advisors.php?personid=" . $personid);
?>
