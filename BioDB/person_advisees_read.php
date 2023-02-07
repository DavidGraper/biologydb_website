<?php
  include 'db.inc.php';

  $personid = $_GET['personid'];
  $advisees = getadviseelist();

  $sql = "select a.*, b.lastname, b.firstname from data_person_academicadvisors a join data_persons b on a.adviseeid = b.id where a.advisorid=" . $personid . " order by a.id";
  $result = $conn->query($sql);

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr>";

    if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="person_advisees_update.php" method="POST">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $personid . '">';

      // Advisor
      echo '<td>';
      $currentadviseeid = $row['adviseeid'];
      echo '<select id="adviseeid" name="adviseeid">\n';
      foreach ($advisees as $adviseeid => $adviseevalue) {
        if ($currentadviseeid == $adviseeid){
          echo "<option value=" . $adviseeid . " selected>" . $adviseevalue . "</option>";
        } else {
          echo "<option value=" . $adviseeid . ">" . $adviseevalue . "</option>";
        }
      }
      echo '</td>';

      // Start Date
      if (isset($row['startdate']) == 1) {
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

      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $personid . '">';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<td><a class="btn btn-danger" href="person_advisees.php?personid=' . $personid . '" role="button">Cancel</a></td>';
      echo '</form>';
    } else {
      echo "<td>" . $row['lastname'] . ", " . $row['firstname'] . "</td>";
      echo "<td>" . $row['startdate'] . "</td>";
      echo "<td>" . $row['enddate'] . "</td>";
      echo '<td><a class="btn btn-primary" href="person_advisees.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
      echo '<td><a class="btn btn-danger" href="person_advisees_delete.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
    }
    echo "</tr>";
  }
?>
