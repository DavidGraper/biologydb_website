<?php

  function getroomlist() {

    include 'db.inc.php';

    $sql = "select id, roomnumber from data_rooms order by roomnumber";
    $result = $conn->query($sql);

    $memberlist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $roomlist[$row['id']] = $row['roomnumber'];
    }

    return $roomlist;
}

function getroomtypelist() {
	include 'db.inc.php';

	$sql = "select * from code_roomtypes";
	$result = $conn->query($sql);

    $roommemberlist = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$roomtypes[$row['id']] = $row['roomtype'];
	}

	return $roomtypes;
}

?>


