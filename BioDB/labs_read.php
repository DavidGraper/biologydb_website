<?php

include 'db.inc.php';

$sql = "select a.id, a.labname, b.firstname, b.lastname from data_labs a join data_persons b on a.primaryinvestigatorid = b.id order by a.labname";

$result = $conn->query($sql);

while ($row = $result-> fetch(PDO::FETCH_ASSOC)) {
	echo "<tr>";
	
	echo '<td><label class="control-label col-lg-3">' . $row['labname'] . '</label></td>';
	echo '<td><label class="control-label col-lg-3">' . $row['firstname'] . ' ' . $row['lastname'] . '</label></td>';
	$labid = $row['id'];

	echo '<td><a id="btnUpdate" class="btn btn-primary" href="lab_generalinfo.php?labid=' . $labid . '" role="button">Update</a></td>';
	echo '<td><a class="btn btn-danger" href="lab_delete.php?personid=' . $labid . '" role="button">Delete</a></td>';
}
echo "</tr>";
?>
