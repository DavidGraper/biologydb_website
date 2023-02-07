<?php

  function getethnicitylist() {

    include 'db.inc.php';
    include "person_ethnicities_static_codetables.php";

    $sql = "select id, ethnicity from code_ethnicity order by ethnicity";
    $result = $conn->query($sql);

    $ethnicitylist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $ethnicitylist[$row['id']] = $row['ethnicity'];
    }

    return $ethnicitylist;
  }

?>
