<?php
  include 'db.inc.php';

  // $id = $_POST['id'];
  $personid = $_POST['personid'];
  $phonetypeid = $_POST['phonetypeid'];
  $phonenumber = $_POST['phonenumber'];
  $confidentialitylevelid = $_POST['confidentialitylevelid'];

  if (isset($_POST['usphone'])){
    $usphone=1;
  } else {
    $usphone=0;
  }

  $sql = "insert into data_person_phones (personid,
  phonetypeid,
  usphone,
  phonenumber,
  confidentialitylevelid)
  values
  ($personid,
  $phonetypeid,
  $usphone,
  '$phonenumber',
  $confidentialitylevelid)";

echo($sql);
  
  $conn->query($sql);
  header("location: person_telephonenumbers.php?personid=$personid");
?>
