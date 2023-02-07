<?php
  include 'db.inc.php';

  $personid = $_GET["personid"];
  $jobtitles = getjobtitlelist();
  $jobtitletypes = getjobtitletypelist();

  $sql = "select * from data_person_biologydeptjobtitles where personid=" . $personid . " order by id";
  $result = $conn->query($sql);

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr>";

    if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="person_biologyjobtitles_update.php" method="POST">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';

      // Biology Job Title
      echo "<td>";
      $currentjobtitleid = $row['biologyjobtitleid'];
      echo '<select id="jobtitleid" name="jobtitleid">\n';
      foreach ($jobtitles as $jobtitleid => $jobtitlevalue) {
        if ($currentjobtitleid == $jobtitleid){
          echo "<option value=" . $jobtitleid . " selected>" . $jobtitlevalue . "</option>";
        } else {
          echo "<option value=" . $jobtitleid . ">" . $jobtitlevalue . "</option>";
        }
      }

      // Start Date
      if (isset($row['startdate'])) {
			$startdate = new DateTime($row['startdate']);
			echo '<td><input type="date" class="form-control" name="startdate" value="' . $startdate->format('Y-m-d') . '"></td>';
		} else {
			echo '<td><input type="date" class="form-control" name="startdate"></td>';
		}

	// End Date
      if (isset($row['enddate'])) {
			$enddate = new DateTime($row['enddate']);
			echo '<td><input type="date" class="form-control" name="enddate" value="' . $enddate->format('Y-m-d') . '"></td>';
		} else {
			echo '<td><input type="date" class="form-control" name="enddate"></td>';
		}

		echo '<input type="hidden" class="form-control" name="datasourceid" value="' . $row['datasourceid'] . '">';
		echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
		echo '<td><a class="btn btn-danger" href="person_biologyjobtitles.php?personid=' . $personid . '" role="button">Cancel</a></td>';
		echo '</form>';
	} else {
		echo "<td>" . $jobtitles[$row['biologyjobtitleid']] . "</td>";

		if (isset($row['startdate'])) {
			$startdate = new DateTime($row['startdate']);
			$start = $startdate->format('Y-m-d');
		} else {
			$start = "";
		}

		if (isset($row['enddate'])) {
			$enddate = new DateTime($row['enddate']);
			$end = $enddate->format('Y-m-d');
		} else {
			$end = "";
		}

		echo "<td>" . $start . "</td>";
		echo "<td>" . $end . "</td>";

		echo '<td><a class="btn btn-primary" href="person_biologyjobtitles.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
		echo '<td><a class="btn btn-danger" href="person_biologyjobtitles_delete.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
	}
	echo "</tr>";
}
?>
