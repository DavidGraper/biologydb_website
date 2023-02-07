<?php
  include 'db.inc.php';

  // $id = $_POST['id'];
  $personid = $_POST['personid'];
  $emailaddresstypeid = $_POST['emailaddresstypeid'];
  $emailaddress = $_POST['emailaddress'];
  $confidentialitylevelid = $_POST['confidentialitylevelid'];
  $datasourceid = $_POST['datasourceid'];

  $sql = "insert into data_person_emailaddresses (personid,
  emailaddresstypeid,
  emailaddress,
  confidentialitylevelid,
  datasourceid)
  values
  ($personid,
  '$emailaddresstypeid',
  '$emailaddress',
  '$confidentialitylevelid',
  '$datasourceid')";

  $conn->query($sql);
  header("location: person_emailaddresses.php?personid=$personid");
?>
