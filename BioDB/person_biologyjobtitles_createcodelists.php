<?php

  function getjobtitlelist() {

    include 'db.inc.php';
    include "person_biologyjobtitles_static_codetables.php";

    $sql = "select id, jobtitle from code_biology_jobtitles order by jobtitle";
    $result = $conn->query($sql);

    $jobtitlelist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $jobtitlelist[$row['id']] = $row['jobtitle'];
    }

    return $jobtitlelist;
  }

  function getjobtitletypelist() {

    include 'db.inc.php';
    include "person_biologyjobtitles_static_codetables.php";

    $sql = "select id, jobtype from code_jobtypes order by jobtype";
    $result = $conn->query($sql);

    $jobtitletypelist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $jobtitletypelist[$row['id']] = $row['jobtype'];
    }

    return $jobtitletypelist;
  }
?>
