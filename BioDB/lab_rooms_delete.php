<?php
  include 'db.inc.php';

  $id = $_GET['id'];
  $labid = $_GET['labid'];

  $sql = "delete from data_lab_rooms where id=$id";
  $conn->query($sql);
  header("location: lab_rooms.php?labid=" . $labid);
?>
