<?php

function getclassschedulerows($year, $semester, $day) {

	include 'db.inc.php';

	$sql = "select a.room, a.coursetitle, a.starthour, a.startminute, "
		. "a.endhour, a.endminute, b.year, b.semester "
		. "from data_classes a "
		. "join code_semesters b "
		. "on a.semesterid = b.id "
		. "where b.year=" . $year . " and b.semester='" . $semester . "' "
		. "and a.day='" . $day . "' "
		. "order by room, coursetitle;";
	$result = $conn->query($sql);

	$classrows = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		array_push($classrows, sprintf("['%s', '%s', new Date(0, 0, 0, %d, %d, 0), new Date(0, 0, 0, %d, %d, 0)]", $row['room'], $row['coursetitle'], $row['starthour'], $row['startminute'], $row['endhour'], $row['endminute']));
	}

	return $classrows;
}

?>
