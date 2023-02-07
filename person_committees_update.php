<?php
  include 'db.inc.php';
  include 'validation.functions.php';

  $id = $_POST['id'];
  $personid = $_POST['personid'];
  $committeeid = $_POST['committeeid'];
  $committeechair = $_POST['committeechair'];
  

$chairvalue = 0;
if ($committeechair == "on") {
	$chairvalue = 1;
}
  
  $sql = "update data_person_committees set personid=$personid, committeeid=$committeeid, chair=$chairvalue where id=$id";

  echo '<h1>' . $sql . '</h1>';

  $result = $conn->query($sql);

  header("location: person_committees.php?personid=".$personid);
?>
