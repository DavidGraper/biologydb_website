<?php
  include 'db.inc.php';

  $id = $_POST['id'];
  $buildingid = $_POST['buildingid'];
  $roomnumber = $_POST['roomnumber'];
  $longname = $_POST['longname'];
  
  $confidentialitylevelid = $_POST['confidentialitylevelid'];
  $datasourceid = $_POST['datasourceid'];

  $sql = "update data_rooms set buildingid='$buildingid', "
	  . "roomnumber='$roomnumber', "
	  . "longname='$longname' where id=$id";

  $result = $conn->query($sql);

  header("location: rooms.php?show=all");
?>
