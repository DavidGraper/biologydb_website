<?php
  include 'db.inc.php';

  $id = $_POST['id'];
  $personid = $_POST['personid'];
  $notes= $_POST['notes'];
  $leavestaken = $_POST['leavestaken'];
  $extensionsgranted = $_POST['extensionsgranted'];
  $comments = $_POST['comments'];

  $sql = "update data_person_notes set personid='$personid',
  notes='$notes',
  leavestaken='$leavestaken',
  extensionsgranted='$extensionsgranted',
  comments='$comments' where id=$id";

  $result = $conn->query($sql);

  header("location: person_notes.php?personid=".$personid);
?>
