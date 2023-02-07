<?php
  include 'db.inc.php';

  $personid = $_GET['personid'];
  $id = $_GET['id'];

  $sql = "delete from data_person_committees where id=$id";
  $conn->query($sql);
  header("location: person_committees.php?personid=" . $personid);
?>
