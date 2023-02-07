<?php
  include 'db.inc.php';

  $id = $_GET['id'];
  $personid = $_GET['personid'];

  $sql = "delete from data_person_education where id=$id";
  $conn->query($sql);
  header("location: person_education.php?personid=" . $personid);
?>
