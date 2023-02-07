<?php

  function getstatuteendlist() {

    include 'db.inc.php';
    include "person_studentrequirements_static_codetables.php";

    $sql = "select id, univcode, semester, year from code_semesters;";
    $result = $conn->query($sql);

    $statuteendlist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $statuteendlist[$row['id']] = $row['univcode'] . " (" . $row['semester'] . " " . $row['year'] . ")";
    }

    return $statuteendlist;
  }
 
  function getsemesters() {

    include 'db.inc.php';
    include "person_studentrequirements_static_codetables.php";

    $sql = "select id, univcode, semester, year from code_semesters;";
    $result = $conn->query($sql);

    $semesters = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $semesters[$row['id']] = $row['semester'] . " " . $row['year'];
    }

    return $semesters;
  }
 
  function getexam1assessments() {

    include 'db.inc.php';
    include "person_studentrequirements_static_codetables.php";

    $sql = "select id, assessment from code_qualifyingexam1assessment;";
    $result = $conn->query($sql);

    $exam1assessments = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $exam1assessments[$row['id']] = $row['assessment'];
    }

    return $exam1assessments;
  }
  
  function getexam2assessments() {

    include 'db.inc.php';
    include "person_studentrequirements_static_codetables.php";

    $sql = "select id, assessment from code_qualifyingexam2assessment;";
    $result = $conn->query($sql);

    $exam2assessments = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $exam2assessments[$row['id']] = $row['assessment'];
    }

    return $exam2assessments;
  }

  ?>
