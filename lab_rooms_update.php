<?php
  include 'db.inc.php';
	
  $id = $_POST['id'];
  $labid = $_POST['labid'];
  $roomid = $_POST['roomid'];

  $sql = "update data_lab_rooms set roomid='$roomid' where id=$id";
  echo $sql;
  $result = $conn->query($sql);

  header("location: lab_rooms.php?labid=".$labid);
?>
