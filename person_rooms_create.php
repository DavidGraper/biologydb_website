<?php
  include 'db.inc.php';

  $personid = $_POST['personid'];
  $roomtypeid = $_POST['roomtypeid'];
  $roomid = $_POST['roomid'];

  $sql = "insert into data_person_rooms (personid,
  roomtypeid,
  roomid)
  values
  ($personid,
  $roomtypeid,
  '$roomid')";

	echo ($sql);
  
  $conn->query($sql);
  header("location: person_rooms.php?personid=$personid");
?>
