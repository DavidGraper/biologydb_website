<?php
  include 'db.inc.php';
  include 'validation.functions.php';

  $id = $_POST['id'];
  $personid = $_POST['personid'];
  $ethnicityid = $_POST['ethnicityid'];

  $sql = "update data_person_ethnicities set personid=$personid,
  ethnicityid=$ethnicityid where id=$id";

  $result = $conn->query($sql);

  header("location: person_ethnicities.php?personid=".$personid);
?>
