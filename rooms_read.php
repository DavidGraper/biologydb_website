<?php

include 'db.inc.php';
include "./rooms_static_codetables.php";

$sql = "select a.id, a.roomnumber, a.longname, a.universitybuildingid, b.buildingname, "
	. "b.buildingabbreviation from data_rooms a "  
	. "join code_university_buildings b "
	. "on a.universitybuildingid = b.id ";

if ($show == 'biology') {
	$sql = $sql . "where b.buildingabbreviation = 'BI' ";
} elseif ($show == "lifesciences") {
	$sql = $sql . "where b.buildingabbreviation = 'LS' ";
}

$sql = $sql . "order by a.roomnumber";

$result = $conn->query($sql);

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	echo "<tr>";
	if (isset($_GET['id']) and $row['id'] == $_GET['id']) {

		echo '<form class="form-inline m-2" action="rooms_update.php" method="POST">';
		echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
		
		// Room Number
		echo '<td><input type="text" class="form-control" name="roomnumber" value="' . $row['roomnumber'] . '"></td>';

		// Room Name
		echo '<td><input type="text" class="form-control" name="longname" value="' . $row['longname'] . '"></td>';
	
		// Building Name 
		echo '<td>';
		echo('<select id="buildingid" name="buildingid">\n');
		foreach ($code_universitybuildings as $key => $value) {
			if ($key == $row['buildingid']) {
				echo("<option value=" . $key . " selected>" . $value . "</option>\n");
			} else {
				echo("<option value=" . $key . ">" . $value . "</option>\n");
			}
		}
		echo("</select>\n");
		echo '</td>';

		echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
		echo '<td><a class="btn btn-danger" href="rooms.php?show=' . $show . '" role="button">Cancel</a></td>';
		echo '</form>';

		
	} else {
		echo '<td><label class="control-label col-lg-3">' . $row['roomnumber'] . '</label></td>';
		echo '<td><label class="control-label col-lg-3">' . $row['longname'] . '</label></td>';
		echo '<td><label class="control-label col-lg-3">' . $row['buildingname'] . '</label></td>';
		$roomid = $row['id'];

		echo '<td><a id="btnUpdate" class="btn btn-primary" href="rooms.php?show=' . $show . '&id=' . $roomid . '" role="button">Update</a></td>';
		echo '<td><a class="btn btn-danger" href="room_delete.php?id=' . $roomid . '" role="button">Delete</a></td>';
	}
}
echo "</tr>";
?>
