<?php

include 'db.inc.php';

$sql = "select a.id, a.lastname, a.firstname, a.active, a.biologypersontypeid, 
	c.jobtitle from data_persons a 
	join data_person_biologydeptjobtitles b on a.id = b.personid 
	join code_biology_jobtitles c on b.biologyjobtitleid = c.id ";

if ($show == 'gradstudents') {
	$sql = $sql . "where a.biologypersontypeid = 3 ";
} elseif ($show == "faculty") {
	$sql = $sql . "where a.biologypersontypeid = 1 ";
} elseif ($show == "staff") {
	$sql = $sql . "where a.biologypersontypeid = 2 ";
}

$sql = $sql . "and a.active = 1 order by a.lastname";

$result = $conn->query($sql);


while ($row = $result-> fetch(PDO::FETCH_ASSOC)) {
	echo "<tr>";
	
	echo '<td><label class="control-label col-lg-3">' . $row['lastname'] . '</label></td>';
	echo '<td><label class="control-label col-lg-3">' . $row['firstname'] . '</label></td>';
	echo '<td><label class="control-label col-lg-3">' . $row['jobtitle'] . '</label></td>';
	$personid = $row['id'];

	echo '<td><a id="btnUpdate" class="btn btn-primary" href="person_streetaddresses.php?personid=' . $personid . '" role="button">Update</a></td>';
	echo '<td><a class="btn btn-danger" href="people_delete.php?personid=' . $personid . '&show=' . $show . '" role="button">Delete</a></td>';
}
echo "</tr>";
?>
