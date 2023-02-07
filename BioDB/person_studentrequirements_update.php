<?php
  include 'db.inc.php';

  $id = $_POST['id'];
  $personid = $_POST['personid'];
  $addresstypeid = $_POST['addresstypeid'];
  $address0 = $_POST['address0'];
  $address1 = $_POST['address1'];
  $address2 = $_POST['address2'];
  $city = $_POST['city'];
  $stateid = $_POST['stateid'];
  $countryid = $_POST['countryid'];
  $zip = $_POST['zip'];
  $confidentialitylevelid = $_POST['confidentialitylevelid'];
  $datasourceid = $_POST['datasourceid'];

  $sql = "update data_person_addresses set personid='$personid',
  addresstypeid='$addresstypeid',
  address0='$address0',
  address1='$address1',
  address2='$address2',
  city='$city',
  stateid='$stateid',
  countryid='$countryid',
  zip='$zip',
  confidentialitylevelid='$confidentialitylevelid',
  datasourceid='$datasourceid' where id=$id";

  $result = $conn->query($sql);

  header("location: person_addresses.php?personid=".$personid);
?>
