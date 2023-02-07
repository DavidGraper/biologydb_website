<?php

  function getfacultylist() {

    include 'db.inc.php';
    include "lab_static_codetables.php";

    $faculty_persontype = array_search('Faculty',$code_biology_persontypes);

    $sql = "select id, lastname, firstname from data_persons where biologypersontypeid=" . $faculty_persontype . " and active=1 order by lastname";
    $result = $conn->query($sql);

    $facultylist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $facultylist[$row['id']] = $row['lastname'] . ", " . $row['firstname'];
    }

    return $facultylist;
  }
  
  function getmemberlist() {

    include 'db.inc.php';

    $sql = "select id, lastname, firstname from data_persons where active=1 order by lastname";
    $result = $conn->query($sql);

    $memberlist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $memberlist[$row['id']] = $row['lastname'] . ", " . $row['firstname'];
    }

    return $memberlist;
  }
  
  ?>
