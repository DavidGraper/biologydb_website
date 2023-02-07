<?php
  include 'db.inc.php';
  include 'validation.functions.php';

  $id = $_POST['id'];
  $personid = $_POST['personid'];
  $roomname = $_POST['roomname'];
  $keypadcodevalue = $_POST['keypadcodevalue'];
  $notes = $_POST['notes'];
  $startdate = $_POST['startdate'];
  $enddate = $_POST['enddate'];
  
  $sql = "update data_person_keypadcodes set personid=$personid,
  roomname='$roomname', keypadcodevalue='$keypadcodevalue', notes='$notes', startdate=";

  if (isValidDate($startdate)){
    $sql = $sql . "'$startdate', enddate=";
  } else {
    $sql = $sql . "null, enddate=";
  }

  if (isValidDate($enddate)){
    $sql = $sql . "'$enddate'";
  } else {
    $sql = $sql . "null";
  }

  $sql = $sql . " where id=$id";

  echo '<h1>' . $sql . '</h1>';

  $result = $conn->query($sql);

  header("location: person_keypadcodes.php?personid=".$personid);
?>
