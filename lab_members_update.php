<?php
  include 'db.inc.php';
	
  $id = $_POST['id'];
  $labid = $_POST['labid'];
  $labroleid = $_POST['labroleid'];

  $sql = "update data_lab_persons set labroleid=$labroleid where id=$id";

  $result = $conn->query($sql);

  header("location: lab_members.php?labid=".$labid);
?>
