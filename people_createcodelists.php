<?php

  function getbiologypersontypes() {

    include 'db.inc.php';

    $sql = "select id, persontype from code_biology_persontypes order by persontype;";
    $result = $conn->query($sql);

    $persontypes = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $persontypes[$row['id']] = $row['persontype'];
    }

    return $persontypes;
  }
 
  function getbiologyjobs() {

    include 'db.inc.php';

	$sql = "select a.id, b.persontype, a.jobtitle "
	. "from code_biology_jobtitles a "
	. "join code_biology_persontypes b "
	. "on a.biologypersontypeid = b.id "
	. "order by b.persontype, a.jobtitle;";

	$result = $conn->query($sql);

	$biologyjobs = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$biologyjobs[$row['id']] = "(" . $row['persontype']
			. ") " . $row['jobtitle'];
	}

	return $biologyjobs;
}

?>
