<?php

  function getadviseelist() {

    include 'db.inc.php';
    include "person_advisors_static_codetables.php";

    $gradstudent_persontype = array_search('Graduate Student',$code_biology_persontypes);

    $sql = "select id, lastname, firstname from data_persons where biologypersontypeid=" . $gradstudent_persontype . " and active=1 order by lastname";
    $result = $conn->query($sql);

    $adviseelist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $adviseelist[$row['id']] = $row['lastname'] . ", " . $row['firstname'];
    }

    return $adviseelist;
  }

?>
