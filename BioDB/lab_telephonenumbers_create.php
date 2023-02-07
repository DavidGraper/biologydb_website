<?php
  include 'db.inc.php';
  include 'validation.functions.php';

  $labid = $_POST['labid'];
  $telephonenumber = $_POST['telephonenumber'];
  $confidentialitylevelid = $_POST['confidentialitylevelid'];

  $sql = "insert into data_lab_phones (labid,
  phonenumber,
  confidentialitylevelid)
  values
  ($labid, $telephonenumber, $confidentialitylevelid)";

  echo $sql;

  $conn->query($sql);

  header("location: lab_telephonenumbers.php?labid=$labid");
?>
