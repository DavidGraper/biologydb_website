<?php
  include 'db.inc.php';

  $id = $_GET['id'];
  $labid = $_GET['labid'];

  $sql = "delete from data_lab_phones where id=$id";
  $conn->query($sql);
  header("location: lab_telephonenumbers.php?labid=" . $labid);
?>
