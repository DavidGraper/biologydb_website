<?php

  function getadvisorlist() {

    include 'db.inc.php';
    include "person_advisors_static_codetables.php";

    $faculty_persontype = array_search('Faculty',$code_biology_persontypes);

    $sql = "select id, lastname, firstname from data_persons where persontypeid=" . $faculty_persontype . " and active=1 order by lastname";
    $result = $conn->query($sql);

    $advisorlist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $advisorlist[$row['id']] = $row['lastname'] . ", " . $row['firstname'];
    }

    return $advisorlist;
  }

?>
