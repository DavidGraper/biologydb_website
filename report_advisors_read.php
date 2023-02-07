<?php

include 'db.inc.php';
include "lab_static_codetables.php";

$labid = $_GET['labid'];

// Get list of current advisors 
$sql = "select a.*, b.roomnumber from data_lab_rooms a join data_rooms b on a.roomid =b.id where a.labid = " . $labid . " order by roomnumber";

$result = $conn->query($sql);

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

	echo "<tr>";

	if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
		echo '<form class="form-inline m-2" action="lab_rooms_update.php" method="POST">';
		echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		echo '<input type="hidden" name="labid" value="' . $labid . '">';
		echo '<td>';
		$currentroomid = $row['roomid'];
		$roomlist = getroomlist();
		echo '<select id="roomid" name="roomid">\n';
		foreach ($roomlist as $key => $value) {
			if ($key == $currentroomid) {
				echo "<option value=" . $key . " selected>" . $value . "</option>";
			} else {
				echo "<option value=" . $key . ">" . $value . "</option>";
			}
		}
		echo '</td>';
		echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
		echo '<td><a class="btn btn-danger" href="lab_rooms.php?labid=' . $labid . '" role="button">Cancel</a></td>';
		echo '</form>';
		echo "</tr>";
	} else {
		echo '<form class="form-inline m-2" action="lab_roomnumbers_update.php" method="POST">';
		echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		echo '<input type="hidden" name="labid" value="' . $labid . '">';
		echo "<td>" . $row['roomnumber'] . "</td>";
		echo '<td><a class="btn btn-primary" href="lab_rooms.php?labid=' . $labid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
		echo '<td><a class="btn btn-danger" href="lab_rooms_delete.php?labid=' . $labid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
		echo '</form>';
		echo "</tr>";
	}
}
?>
