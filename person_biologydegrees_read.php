<?php
  include 'db.inc.php';

  $personid = $_GET["personid"];
  $biologydegreeareas = getbiologydegreearealist();
  $biologydegreetypes = getbiologydegreetypelist();
  $semesters = getsemesters();

  $sql = "select * from data_person_biologydegreeareas where personid=" . $personid . " order by id";
  $result = $conn->query($sql);

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr>";

    if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="person_biologydegrees_update.php" method="POST">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';

      // Biology Degree Area
      echo "<td>";
      $currentbiologydegreeareaid = $row['biologydegreeareaid'];
      echo '<select id="biologydegreeareaid" name="biologydegreeareaid">\n';
      foreach ($biologydegreeareas as $biologydegreeareaid => $biologydegreeareavalue) {
        if ($currentbiologydegreeareaid == $biologydegreeareaid){
          echo "<option value=" . $biologydegreeareaid . " selected>" . $biologydegreeareavalue . "</option>";
        } else {
          echo "<option value=" . $biologydegreeareaid . ">" . $biologydegreeareavalue . "</option>";
        }
      }

      // Biology Degree Type
      echo "<td>";
      $currentbiologydegreetypeid = $row['biologydegreetypeid'];
      echo '<select id="biologydegreetypeid" name="biologydegreetypeid">\n';
      foreach ($biologydegreetypes as $biologydegreetypeid => $biologydegreetypevalue) {
        if ($currentbiologydegreetypeid == $biologydegreetypeid){
          echo "<option value=" . $biologydegreetypeid . " selected>" . $biologydegreetypevalue . "</option>";
        } else {
          echo "<option value=" . $biologydegreetypeid . ">" . $biologydegreetypevalue . "</option>";
        }
      }

//      // Start Date
//      if (isset($row['startdate']) == 1) {
//        $startdate = new DateTime($row['startdate']);
//        echo '<td><input type="date" class="form-control" name="startdate" value="' . $startdate->format('Y-m-d') . '"></td>';
//      } else {
//        echo '<td><input type="date" class="form-control" name="startdate"></td>';
//      }

     // Starting Semester
      echo '<td>';
      echo('<select id="startingsemesterid" name="startingsemesterid">\n');
      foreach($semesters as $key=>$value) {
        if ($key == $row['startingsemesterid']){
          echo("<option value=" . $key . " selected>" . $value . "</option>\n");
        } else {
          echo("<option value=" . $key . ">" . $value . "</option>\n");
        }
      }
      echo("</select>\n");
      echo '</td>';

      // End Date
      if (isset($row['enddate'])) {
        $enddate = new DateTime($row['enddate']);
        echo '<td><input type="date" class="form-control" name="enddate" value="' . $enddate->format('Y-m-d') . '"></td>';
      } else {
        echo '<td><input type="date" class="form-control" name="enddate"></td>';
      }

      echo '<input type="hidden" class="form-control" name="datasourceid" value="' . $row['datasourceid'] . '">';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<td><a class="btn btn-danger" href="person_biologydegreearea.php?personid=' . $personid . '" role="button">Cancel</a></td>';
      echo '</form>';
    } else {
		echo "<td>" . $biologydegreeareas[$row['biologydegreeareaid']] . "</td>";
		echo "<td>" . $biologydegreetypes[$row['biologydegreetypeid']] . "</td>";

		// Starting Semester 
		echo "<td>" . $semesters[$row['startingsemesterid']] . "</td>";

		// End date
		if (isset($row['enddate'])) {
			$enddate = new DateTime($row['enddate']);
			$end = $enddate->format('Y-m-d');
		} else {
			$end = "";
		}

		echo "<td>" . $end . "</td>";

		echo '<td><a class="btn btn-primary" href="person_biologydegrees.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
		echo '<td><a class="btn btn-danger" href="person_biologydegrees_delete.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
	}
	echo "</tr>";
}
?>
