<?php
  include 'db.inc.php';

  $id = $_POST['id'];
  $personid = $_POST['personid'];
  $phonetypeid = $_POST['phonetypeid'];
  $phonenumber = $_POST['phonenumber'];
  $usphone = $_POST['usphone'];
  $confidentialitylevelid = $_POST['confidentialitylevelid'];
  $datasourceid = $_POST['datasourceid'];

  $sql = "update data_person_phones set personid='$personid',
  phonetypeid='$phonetypeid',
  phonenumber='$phonenumber',
  usphone='$usphone',
  confidentialitylevelid='$confidentialitylevelid',
  datasourceid='$datasourceid' where id=$id";

  $result = $conn->query($sql);

  header("location: person_telephonenumbers.php?personid=".$personid);
?>
