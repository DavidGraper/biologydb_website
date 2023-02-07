<?php include 'db.inc.php'; include 'validation.functions.php';

  $personid = $_POST['personid'];
  $roomname = $_POST['roomname'];
  $keypadcode = $_POST['keypadcode'];
  $notes = $_POST['notes'];
  $startdate = $_POST['startdate'];
  $enddate = $_POST['enddate'];

  $sql = "insert into data_person_keypadcodes (personid, roomname,
	  keypadcode, notes, startdate, enddate) values 
	  ($personid, '$roomname', '$keypadcode', '$notes', ";

  if (isValidDate($startdate)){
    $sql = $sql . "'$startdate',";
  } else {
    $sql = $sql . "null,";
  }

  if (isValidDate($enddate)){
    $sql = $sql . "'$enddate')";
  } else {
    $sql = $sql . "null)";
  }

  echo "<h1>" . $sql . "</h1>";
  
  $conn->query($sql); 
  
  header("location:person_keypadcodes.php?personid=$personid"); 
  
  ?>
