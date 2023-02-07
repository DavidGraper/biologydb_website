<?php
  include 'db.inc.php';

  // $id = $_POST['id'];
  $personid = $_POST['personid'];
  $phonetypeid = $_POST['phonetypeid'];
  $phonenumber = $_POST['phonenumber'];

  if (isset($_POST['usphone'])){
    $usphone=1;
  } else {
    $usphone=0;
  }

  $confidentialitylevelid = $_POST['confidentialitylevelid'];
  $datasourceid = $_POST['datasourceid'];

  $sql = "insert into data_person_phones (personid,
  phonetypeid,
  usphone,
  phonenumber,
  confidentialitylevelid,
  datasourceid)
  values
  ($personid,
  '$phonetypeid',
  '$usphone',
  '$phonenumber',
  '$confidentialitylevelid',
  '$datasourceid')";

  $conn->query($sql);
  header("location: person_telephonenumbers.php?personid=$personid");
?>
