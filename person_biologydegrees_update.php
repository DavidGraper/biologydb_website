<?php
  include 'db.inc.php';
  include 'validation.functions.php';

  $id = $_POST['id'];
  $personid = $_POST['personid'];
  $biologydegreeareaid = $_POST['biologydegreeareaid'];
  $biologydegreetypeid = $_POST['biologydegreetypeid'];
  $startingsemesterid = $_POST['startingsemesterid'];
  $enddate = $_POST['enddate'];

  $sql = "update data_person_biologydegreeareas set personid=$personid,
  biologydegreeareaid=$biologydegreeareaid,
  biologydegreetypeid=$biologydegreetypeid, startingsemesterid=$startingsemesterid, ";

  if ($enddate==''){
    $sql = $sql . "enddate=null ";
  }else{
    $sql = $sql . "enddate='$enddate' ";
  }

  $sql = $sql . " where id=$id";
  echo "<h1>" . $sql . "</h1>";
  $result = $conn->query($sql);

  header("location: person_biologydegrees.php?personid=".$personid);
?>
