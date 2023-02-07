<?php

  function getcommitteetypes() {

    include 'db.inc.php';

    $sql = "select * from code_committeetypes";
    $result = $conn->query($sql);

    $committeetypelist = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$committeetypelist[$row['id']] = $row['committeetype'];
	}

	return $committeetypelist;
}

function getcommittees() {

	include 'db.inc.php';

	$sql = "select a.id, cc.committeetype, a.committeename from code_committees a "
		. "join code_committeetypes cc on a.committeetypeid  = cc.id "
		. "order by cc.committeetype, a.committeename";
	
	$result = $conn->query($sql);

	$committeelist = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$committeelist[$row['id']] = "(" . $row['committeetype'] . ") " . $row['committeename'];
	}

	return $committeelist;
}

?>
