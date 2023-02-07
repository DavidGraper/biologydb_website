<?php

  function getbiologydegreearealist() {

    include 'db.inc.php';
    include "person_biologydegrees_static_codetables.php";

    $sql = "select id, degreearea from code_biology_degreearea order by degreearea";
    $result = $conn->query($sql);

    $biologydegreearealist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $biologydegreearealist[$row['id']] = $row['degreearea'];
    }

    return $biologydegreearealist;
  }

  function getbiologydegreetypelist() {

    include 'db.inc.php';
    include "person_biologydegrees_static_codetables.php";

    $sql = "select id, degreetype from code_biology_degreetype order by degreetype";
    $result = $conn->query($sql);

    $biologydegreetypelist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $biologydegreetypelist[$row['id']] = $row['degreetype'];
    }

    return $biologydegreetypelist;
  }
 
  function getsemesters() {

    include 'db.inc.php';

    $sql = "select id, univcode, semester, year from code_semesters;";
    $result = $conn->query($sql);

    $semesters = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $semesters[$row['id']] = $row['semester'] . " " . $row['year'];
    }

    return $semesters;
  }
  
?>
