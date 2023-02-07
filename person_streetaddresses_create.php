<?php
  include 'db.inc.php';

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

  $sql = "insert into data_person_addresses (personid,
  addresstypeid,
  address0,
  address1,
  address2,
  city,
  stateid,
  countryid,
  zip,
  confidentialitylevelid)
  values
  ($personid,
  $addresstypeid,
  '$address0',
  '$address1',
  '$address2',
  '$city',
  $stateid,
  $countryid,
  '$zip',
  $confidentialitylevelid)";

echo($sql);
  
  $conn->query($sql);
  header("location: person_streetaddresses.php?personid=$personid");
?>
