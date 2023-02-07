<?php
  include 'db.inc.php';
	
  $id = $_POST['id'];
  $labid = $_POST['labid'];
  $phonenumber = $_POST['phonenumber'];
  $confidentialitylevelid = $_POST['confidentialitylevelid'];

  $sql = "update data_lab_phones set phonenumber='$phonenumber', confidentialitylevelid=$confidentialitylevelid where id=$id";
  echo $sql;
  $result = $conn->query($sql);

  header("location: lab_telephonenumbers.php?labid=".$labid);
?>
