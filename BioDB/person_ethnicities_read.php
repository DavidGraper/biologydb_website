<?php
  include 'db.inc.php';

  $personid = $_GET["personid"];
  $ethnicities = getethnicitylist();

  $sql = "select * from data_person_ethnicities where personid=" . $personid . " order by id";
  $result = $conn->query($sql);

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr>";

    if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="person_ethnicities_update.php" method="POST">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';

      echo "<td>";
      $currentethnicityid = $row['ethnicityid'];
      echo '<select id="ethnicityid" name="ethnicityid">\n';
      foreach ($ethnicities as $ethnicityid => $ethnicityvalue) {
        if ($currentethnicityid == $ethnicityid){
          echo "<option value=" . $ethnicityid . " selected>" . $ethnicityvalue . "</option>";
        } else {
          echo "<option value=" . $ethnicityid . ">" . $ethnicityvalue . "</option>";
        }
      }

      echo '<input type="hidden" class="form-control" name="datasourceid" value="' . $row['datasourceid'] . '">';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<td><a class="btn btn-danger" href="person_ethnicities.php?personid=' . $personid . '" role="button">Cancel</a></td>';
      echo '</form>';
    } else {
      echo "<td>" . $ethnicities[$row['ethnicityid']] . "</td>";

      echo '<td><a class="btn btn-primary" href="person_ethnicities.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
      echo '<td><a class="btn btn-danger" href="person_ethnicities_delete.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
    }
    echo "</tr>";
  }
?>
