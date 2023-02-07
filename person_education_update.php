<?php

include 'db.inc.php';

$id = $_POST['id'];
$personid = $_POST['personid'];
$institution = $_POST['institution'];
$degree = $_POST['degree'];
$gradyear = $_POST['gradyear'];

$sql = "update data_person_education set institution='$institution', degree='$degree', gradyear='$gradyear' where id=$id";

$result = $conn->query($sql);

header("location: person_education.php?personid=" . $personid);
?>
