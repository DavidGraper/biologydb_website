<?php
  include 'db.inc.php';

  $personid = $_GET['personid'];
  $id = $_GET['id'];

  $sql = "delete from data_person_biologydegreeareas where id=$id";
  $conn->query($sql);
  header("location: person_biologydegrees.php?personid=" . $personid);
?>
