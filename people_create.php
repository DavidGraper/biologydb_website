<?php

include 'db.inc.php';

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$biologypersontypeid = $_POST['biologypersontypeid'];
$biologyjobtitleid = $_POST['biologyjobtitleid'];
$show = $_POST['show'];

$sql = "call sp_addnewperson('"
	. $lastname . "', '"
	. $firstname . "', "
	. $biologypersontypeid . ", "
	. $biologyjobtitleid . ")";

$conn->query($sql);
header("location: people.php?show=$show");

?>
