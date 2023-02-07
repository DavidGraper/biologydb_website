<?php

include 'db.inc.php';

$id = $_POST['id'];
$personid = $_POST['personid'];
$roomtypeid = $_POST['roomtypeid'];
$roomid = $_POST['roomid'];

$sql = "update data_person_rooms set personid='$personid',
  roomtypeid=$roomtypeid,
  roomid='$roomid' where id=$id";

$result = $conn->query($sql);

header("location: person_rooms.php?personid=" . $personid);
?>
