<?php
  include 'db.inc.php';

$id = $_POST['id'];
  $personid = $_POST['personid'];
  $notes= $_POST['notes'];
  $leavestaken = $_POST['leavestaken'];
  $extensionsgranted = $_POST['extensionsgranted'];
  $comments = $_POST['comments'];

  $sql = "insert into data_person_notes (personid,
  leavestaken,
  extensionsgranted,
  comments, 
  notes)
  values
  ($personid,
  '$leavestaken',
  '$extensionsgranted',
  '$comments',
  '$notes')";

  $conn->query($sql);
  header("location: person_notes.php?personid=$personid");
?>
