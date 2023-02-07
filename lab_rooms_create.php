<?php
  include 'db.inc.php';
  include 'validation.functions.php';

  $labid = $_POST['labid'];
  $roomid = $_POST['roomid'];

  $sql = "insert into data_lab_rooms(labid,
  roomid)
  values
  ($labid, $roomid)";

  echo $sql;

  $conn->query($sql);

  header("location: lab_rooms.php?labid=$labid");
?>
