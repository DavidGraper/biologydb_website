<?php

  function getdocumenttypes() {

    include 'db.inc.php';

    $sql = "select id, documenttype from code_documenttypes order by documenttype";
    $result = $conn->query($sql);

    $documenttypelist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $documenttypelist[$row['id']] = $row['documenttype'];
    }

    return $documenttypelist;
  }
  
?>
