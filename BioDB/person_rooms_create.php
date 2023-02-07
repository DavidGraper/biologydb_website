<?php
  include 'db.inc.php';

  $personid = $_POST['personid'];
  $roomtypeid = $_POST['roomtypeid'];
  $roomname = $_POST['roomname'];

  $sql = "insert into data_person_rooms (personid,
  roomtypeid,
  roomname)
  values
  ($personid,
  '$roomtypeid',
  '$roomname')";

  $conn->query($sql);
  header("location: person_rooms.php?personid=$personid");
?>
