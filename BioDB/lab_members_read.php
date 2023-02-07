<?php

include 'db.inc.php';
include "lab_static_codetables.php";

$labid = $_GET['labid'];

// Get current members
$sql = "select a.id, a.personid, a.labid, a.labroleid, c.role, b.lastname, b.firstname " .
	"from data_lab_persons a " .
	"join data_persons b on a.personid = b.id " .
	"join code_labrole c on a.labroleid = c.id " .
	"where a.labid =" . $labid . " order by b.lastname";

$result = $conn->query($sql);

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

	echo "<tr>";

	if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
		echo '<form class="form-inline m-2" action="lab_members_update.php" method="POST">';
		echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		echo '<input type="hidden" name="labid" value="' . $labid . '">';
		echo "<td>" . $row['lastname'] . ", " . $row['firstname'] . "</td>";
		echo '<td>';
		$currentlabroleid = $row['labroleid'];
		echo '<select id="labroleid" name="labroleid">\n';
		foreach ($code_labroles as $key => $value) {
			if ($key == $currentlabroleid) {
				echo "<option value=" . $key . " selected>" . $value . "</option>";
			} else {
				echo "<option value=" . $key . ">" . $value . "</option>";
			}
		}
		echo '</td>';
		echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
		echo '<td><a class="btn btn-danger" href="lab_members.php?labid=' . $labid . '" role="button">Cancel</a></td>';
		echo '</form>';
		echo "</tr>";
	} else {
		echo '<form class="form-inline m-2" action="lab_members_update.php" method="POST">';
		echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		echo '<input type="hidden" name="labid" value="' . $labid . '">';
		echo "<td>" . $row['lastname'] . ", " . $row['firstname'] . "</td>";
		echo "<td>" . $row['role'] . "</td>";
		echo '<td><a class="btn btn-primary" href="lab_members.php?labid=' . $labid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
		echo '<td><a class="btn btn-danger" href="lab_members_delete.php?labid=' . $labid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
		echo '</form>';
		echo "</tr>";
	}
}
?>
