<?php
  include 'db.inc.php';

  $personid = $_POST['personid'];
  $documentfilepath= $_POST['documentfilepath'];

  $sql = "update data_persons set documentfilepath='$documentfilepath' where id=$personid";

  $result = $conn->query($sql);

  header("location: person_settings.php?personid=".$personid);
?>
