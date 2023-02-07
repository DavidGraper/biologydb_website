<?php
  include 'db.inc.php';

  $personid = $_GET["personid"];

  $sql = "select * from data_person_keypadcodes where personid=" . $personid . " order by id";
  $result = $conn->query($sql);

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr>";

    if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="person_keypadcodes_update.php" method="POST">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';
      
      echo '<td><input type="text" class="form-control" name="roomname" value="' . $row['roomname'] . '"></td>';
      echo '<td><input type="text" class="form-control" name="keypadcode" value="' . $row['keypadcode'] . '"></td>';
      
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

      echo '<td><input type="text" class="form-control" name="notes" value="' . $row['notes'] . '"></td>';
      
      echo '<input type="hidden" class="form-control" name="datasourceid" value="' . $row['datasourceid'] . '">';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<td><a class="btn btn-danger" href="person_keypadcode.php?personid=' . $personid . '" role="button">Cancel</a></td>';
      echo '</form>';
    } else {
      echo "<td>" . $row['roomname'] . "</td>";
      echo "<td>" . $row['keypadcode'] . "</td>";
      echo "<td>" . $row['startdate'] . "</td>";
      echo "<td>" . $row['enddate'] . "</td>";
      echo "<td>" . $row['notes'] . "</td>";

      echo '<td><a class="btn btn-primary" href="person_keypadcodes.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
      echo '<td><a class="btn btn-danger" href="person_keypadcodes_delete.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
    }
    echo "</tr>";
  }
?>
