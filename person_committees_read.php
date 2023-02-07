<?php
  include 'db.inc.php';

  $personid = $_GET["personid"];

  $sql = "select * from data_person_committees where personid=" . $personid . " order by id";
  $result = $conn->query($sql);

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr>";

    if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="person_committees_update.php" method="POST">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';

      // Committee Name 
      echo "<td>";
      $currentcommitteeid = $row['committeeid'];
      echo '<select id="committeeid" name="committeeid">\n';
      foreach ($committees as $committeeid => $committeevalue) {
        if ($currentcommitteeid == $committeeid){
          echo "<option value=" . $committeeid . " selected>" . $committeevalue . "</option>";
        } else {
          echo "<option value=" . $committeeid . ">" . $committeevalue . "</option>";
        }
      }
      echo '</td>';
      echo '<td>';

		if ($row['chair'] == 1) {
			echo '<input type="checkbox" class="form-control" id="committeechair" name="committeechair" checked></input>';
		} else {
			echo '<input type="checkbox" class="form-control" id="committeechair" name="committeechair"></input>';
		}

		echo "</td>";
		echo '<input type="hidden" class="form-control" name="datasourceid" value="' . $row['datasourceid'] . '">';
		echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
		echo '<td><a class="btn btn-danger" href="person_committees.php?personid=' . $personid . '" role="button">Cancel</a></td>';
		echo '</form>';
	} else {
		echo "<td>" . $committees[$row['committeeid']] . "</td>";

		$yeschair = "";
		if ($row['chair'] == 1) {
			$yeschair = "Chair";
		}
		echo "<td>" . $yeschair . '</td>';
		echo '<td><a class="btn btn-primary" href="person_committees.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
		echo '<td><a class="btn btn-danger" href="person_committees_delete.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
	}
	echo "</tr>";
}
?>
