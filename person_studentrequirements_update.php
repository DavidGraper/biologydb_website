<?php

include 'db.inc.php';

$id = $_POST['id'];
$personid = $_POST['personid'];
$entrydate = $_POST['entrydate'];
$statuteendid = $_POST['statuteendid'];
$overallprogress = $_POST['overallprogress'];
$teaching1 = $_POST['teaching1'];
$teaching2 = $_POST['teaching2'];
$toolcourse = $_POST['toolcourse'];
$exam1semesterid = $_POST['exam1semesterid'];
$exam1resultid = $_POST['exam1resultid'];
$exam2semesterid = $_POST['exam2semesterid'];
$exam2resultid = $_POST['exam2resultid'];
$selectcommittee = $_POST['selectcommittee'];
$advancetocandidacy = $_POST['advancetocandidacy'];
$approvaloftopic = $_POST['approvaloftopic'];

$sql = "update data_person_academicschedule set personid=$personid,
entrydate='$entrydate',
statuteendid=$statuteendid,
overallprogress='$overallprogress',
teaching1='$teaching1',
teaching2='$teaching2',
toolcourse='$toolcourse',
exam1semesterid=$exam1semesterid,
exam1resultid=$exam1resultid,
exam2semesterid=$exam2semesterid,
exam2resultid=$exam2resultid,
selectcommittee='$selectcommittee',
advancetocandidacy='$advancetocandidacy',
approvaloftopic='$approvaloftopic' where id=$id";

  $result = $conn->query($sql);

  header("location: person_studentrequirements.php?personid=".$personid);
?>
