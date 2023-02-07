<?php
  include 'db.inc.php';

  $personid = $_GET['personid'];
  $id = $_GET['id'];

  $sql = "delete from data_person_jobtitles where id=$id";
  $conn->query($sql);
  header("location: person_jobtitles.php?personid=" . $personid);
?>
