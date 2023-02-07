<?php

include 'db.inc.php';
include "person_telephonenumbers_static_codetables.php";

$personid = $_GET['personid'];

$sql = "select * from data_person_phones where personid=" . $personid . " order by id";
$result = $conn->query($sql);

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	echo "<tr>";
	if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
		echo '<form class="form-inline m-2" action="person_telephonenumbers_update.php" method="POST">';
		echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';

		// Phone Number Type
		echo '<td>';
		echo('<select id="phonenumbertypeid" name="phonenumbertypeid">\n');
		foreach ($code_phonetypes as $key => $value) {
			if ($key == $row['phonetypeid']) {
				echo("<option value=" . $key . " selected>" . $value . "</option>\n");
			} else {
				echo("<option value=" . $key . ">" . $value . "</option>\n");
			}
		}
		echo("</select>\n");
		echo '</td>';

		// Phone Number
		echo '<td><input type="text" class="form-control" name="phonenumber" value="' . $row['phonenumber'] . '"></td>';

		// US Phone
		if ($row['usphone'] == 1) {
			echo '<td><input type="checkbox" class="form-control" name="usphone" checked></td>';
		} else {
			echo '<td><input type="checkbox" class="form-control" name="usphone"></td>';
		}

		// Confidentiality Level
		echo '<td>';
		echo('<select id="confidentialitylevelid" name="confidentialitylevelid">\n');
		foreach ($code_confidentialitylevel as $key => $value) {
			if ($key == $row['confidentialitylevelid']) {
				echo("<option value=" . $key . " selected>" . $value . "</option>\n");
			} else {
				echo("<option value=" . $key . ">" . $value . "</option>\n");
			}
		}
		echo("</select>\n");
		echo '</td>';

		echo '<input type="hidden" class="form-control" name="datasourceid" value="' . $row['datasourceid'] . '">';
		echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';
		echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
		echo '<td><a class="btn btn-danger" href="person_telephonenumbers.php?personid=' . $personid . '" role="button">Cancel</a></td>';
		echo '</form>';
	} else {
		echo "<td>" . $code_phonetypes[$row['phonetypeid']] . "</td>";
		echo "<td>" . $row['phonenumber'] . "</td>";
		echo "<td>";
		if ($row['usphone'] == 1) {
			echo "Yes</td>";
		} else {
			echo "No</td>";
		}
		echo "<td>" . $code_confidentialitylevel[$row['confidentialitylevelid']] . "</td>";
		echo '<td><a class="btn btn-primary" href="person_telephonenumbers.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
		echo '<td><a class="btn btn-danger" href="person_telephonenumbers_delete.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
	}
	echo "</tr>";
}
?>
