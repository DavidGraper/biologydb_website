<?php
  include 'db.inc.php';

  $personid = $_GET['personid'];
  $id = $_GET['id'];

  $sql = "delete from data_person_phones where id=$id";
  $conn->query($sql);
  header("location: person_phonenumbers.php?personid=" . $personid);
?>
