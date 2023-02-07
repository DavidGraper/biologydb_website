<?php

include 'db.inc.php';
include "lab_static_codetables.php";

$labid = $_GET['labid'];

// Get current phone numbers
$sql = "select a.*, b.confidentialitylevel " .
	"from data_lab_phones a " .
	"join code_confidentialitylevel b " .
	"on a.confidentialitylevelid = b.id " .
	"where a.labid = " . $labid . " order by phonenumber";

$result = $conn->query($sql);

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

	echo "<tr>";

	if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
		echo '<form class="form-inline m-2" action="lab_telephonenumbers_update.php" method="POST">';
		echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		echo '<input type="hidden" name="labid" value="' . $labid . '">';
		echo "<td>";
		echo '<input type="text" name="phonenumber" value="' . $row['phonenumber'] . '">';
		echo "</td>";
		echo '<td>';
		$currentconfidentialitylevelid = $row['confidentialitylevelid'];
		echo '<select id="confidentialitylevelid" name="confidentialitylevelid">\n';
		foreach ($code_confidentialitylevel as $key => $value) {
			if ($key == $currentconfidentialitylevelid) {
				echo "<option value=" . $key . " selected>" . $value . "</option>";
			} else {
				echo "<option value=" . $key . ">" . $value . "</option>";
			}
		}
		echo '</td>';
		echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
		echo '<td><a class="btn btn-danger" href="lab_telephonenumbers.php?labid=' . $labid . '" role="button">Cancel</a></td>';
		echo '</form>';
		echo "</tr>";
	} else {
		echo '<form class="form-inline m-2" action="lab_telephonenumbers_update.php" method="POST">';
		echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		echo '<input type="hidden" name="labid" value="' . $labid . '">';
		echo "<td>" . $row['phonenumber'] . "</td>";
		echo "<td>" . $row['confidentialitylevel'] . "</td>";
		echo '<td><a class="btn btn-primary" href="lab_telephonenumbers.php?labid=' . $labid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
		echo '<td><a class="btn btn-danger" href="lab_telephonenumbers_delete.php?labid=' . $labid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
		echo '</form>';
		echo "</tr>";
	}
}
?>
