<?php
  include 'db.inc.php';

  $id = $_POST['id'];
  $personid = $_POST['personid'];
  $emailaddresstypeid = $_POST['emailaddresstypeid'];
  $emailaddress = $_POST['emailaddress'];
  $confidentialitylevelid = $_POST['confidentialitylevelid'];
  $datasourceid = $_POST['datasourceid'];

  $sql = "update data_person_emailaddresses set personid='$personid',
  emailaddresstypeid='$emailaddresstypeid',
  emailaddress='$emailaddress',
  confidentialitylevelid='$confidentialitylevelid',
  datasourceid='$datasourceid' where id=$id";

  $result = $conn->query($sql);

  header("location: person_emailaddresses.php?personid=".$personid);
?>
