<?php
  include 'db.inc.php';
  include 'validation.functions.php';

  $id = $_POST['id'];
  $personid = $_POST['personid'];
  $documenttypeid = $_POST['documenttypeid'];
  $filename = $_POST['filename'];

  $sql = "update data_person_documents set personid=$personid,
  documenttypeid=$documenttypeid, filename='$filename' ";

  $sql = $sql . " where id=$id";

echo ($sql);
  
  $result = $conn->query($sql);

  header("location: person_documents.php?personid=".$personid);
?>
