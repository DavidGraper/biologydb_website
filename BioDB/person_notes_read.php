<?php
  include 'db.inc.php';
  include "person_notes_static_codetables.php";

  $personid = $_GET['personid'];

  $sql = "select * from data_person_notes where personid=" . $personid . " order by id";
  $result = $conn->query($sql);

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="person_notes_update.php" method="POST">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';

      echo '<td><input type="text" class="form-control" name="notes" value="' . $row['notes'] . '"></td>';
      echo '<td><input type="text" class="form-control" name="leavestaken" value="' . $row['leavestaken'] . '"></td>';
      echo '<td><input type="text" class="form-control" name="extensionsgranted" value="' . $row['extensionsgranted'] . '"></td>';
      echo '<td><input type="text" class="form-control" name="comments" value="' . $row['comments'] . '"></td>';

      echo '<input type="hidden" class="form-control" name="datasourceid" value="' . $row['datasourceid'] . '">';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<td><a class="btn btn-danger" href="person_notes.php?personid=' . $personid . '" role="button">Cancel</a></td>';
      echo '</form>';
    } else {
      echo "<td>" . $row['notes'] . "</td>";
      echo "<td>" . $row['leavestaken'] . "</td>";
      echo "<td>" . $row['extensionsgranted'] . "</td>";
      echo "<td>" . $row['comments'] . "</td>";
      echo '<td><a class="btn btn-primary" href="person_notes.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
      echo '<td><a class="btn btn-danger" href="person_notes_delete.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
    }
    echo "</tr>";
  }
?>
