<?php
  include 'db.inc.php';
  include "person_education_static_codetables.php";

  $personid = $_GET['personid'];

  $sql = "select * from data_person_education where personid=" . $personid . " order by id";
  $result = $conn->query($sql);

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="person_education_update.php" method="POST">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';

      // Institution
      echo '<td><input type="text" class="form-control" name="institution" value="' . $row['institution'] . '"></td>';

      // Degree
      echo '<td><input type="text" class="form-control" name="degree" value="' . $row['degree'] . '"></td>';

      echo '<input type="hidden" class="form-control" name="datasourceid" value="' . $row['datasourceid'] . '">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<td><a class="btn btn-danger" href="person_education.php?personid=' . $personid . '" role="button">Cancel</a></td>';
      echo '</form>';
    } else {
      echo "<td>" . $row['institution'] . "</td>";
      echo "<td>" . $row['degree'] . "</td>";
      echo '<td><a class="btn btn-primary" href="person_education.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
      echo '<td><a class="btn btn-danger" href="person_education_delete.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
    }
    echo "</tr>";
  }
?>
