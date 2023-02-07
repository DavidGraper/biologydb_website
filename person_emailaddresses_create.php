<?php
  include 'db.inc.php';

  $personid = $_POST['personid'];
  $emailaddresstypeid = $_POST['emailaddresstypeid'];
  $emailaddress = $_POST['emailaddress'];
  $confidentialitylevelid = $_POST['confidentialitylevelid'];

  $sql = "insert into data_person_emailaddresses (personid,
  emailaddresstypeid,
  emailaddress,
  confidentialitylevelid)
  values
  ($personid,
  $emailaddresstypeid,
  '$emailaddress',
  $confidentialitylevelid)";

  $conn->query($sql);
  header("location: person_emailaddresses.php?personid=$personid");
?>
