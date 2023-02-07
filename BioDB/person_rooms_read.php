<?php
  include 'db.inc.php';
  include "person_rooms_static_codetables.php";

  $personid = $_GET['personid'];

  $sql = "select * from data_person_rooms where personid=" . $personid . " order by id";
  $result = $conn->query($sql);

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="person_rooms_update.php" method="POST">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';

      // Room Use Type
      echo '<td>';
      echo('<select id="roomtypeid" name="roomtypeid">\n');
      foreach($code_roomtypes as $key=>$value) {
        if ($key == $row['roomtypeid']){
          echo("<option value=" . $key . " selected>" . $value . "</option>\n");
        } else {
          echo("<option value=" . $key . ">" . $value . "</option>\n");
        }
      }
      echo("</select>\n");
      echo '</td>';

      // Room Name
      echo '<td><input type="text" class="form-control" name="roomname" value="' . $row['roomname'] . '"></td>';

      echo '<input type="hidden" class="form-control" name="datasourceid" value="' . $row['datasourceid'] . '">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<td><a class="btn btn-danger" href="person_rooms.php?personid=' . $personid . '" role="button">Cancel</a></td>';
      echo '</form>';
    } else {
      echo "<td>" . $code_roomtypes[$row['roomtypeid']] . "</td>";
      echo "<td>" . $row['roomname'] . "</td>";
      echo '<td><a class="btn btn-primary" href="person_rooms.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
      echo '<td><a class="btn btn-danger" href="person_rooms_delete.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
    }
    echo "</tr>";
  }
?>
