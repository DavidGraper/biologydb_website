<?php
  include 'db.inc.php';

  $roomnumber = $_POST['roomnumber'];
  $longname = $_POST['longname'];
  $buildingid = $_POST['buildingid'];

  $show = $_GET['show'];

  $sql = "insert into data_rooms (buildingid, roomnumber, longname) values (" . $buildingid . ",'" . $roomnumber . "','" . $longname . "')";

  $conn->query($sql);
  header("location: rooms.php?show=$show");
?>
