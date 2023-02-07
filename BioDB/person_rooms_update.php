<?php
  include 'db.inc.php';

  $id = $_POST['id'];
  $personid = $_POST['personid'];
  $roomtypeid = $_POST['roomtypeid'];
  $roomname = $_POST['roomname'];

  $sql = "update data_person_rooms set personid='$personid',
  roomtypeid='$roomtypeid',
  roomname='$roomname' where id=$id";

  $result = $conn->query($sql);

  header("location: person_rooms.php?personid=".$personid);
?>
