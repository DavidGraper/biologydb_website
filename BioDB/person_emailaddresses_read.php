<?php
  include 'db.inc.php';
  include "person_emailaddresses_static_codetables.php";

  $personid = $_GET['personid'];

  $sql = "select * from data_person_emailaddresses where personid=" . $personid . " order by id";
  $result = $conn->query($sql);

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="person_emailaddresses_update.php" method="POST">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';

      // Email Address Type
      echo '<td>';
      echo('<select id="emailaddresstypeid" name="emailaddresstypeid">\n');
      foreach($code_emailaddresstypes as $key=>$value) {
        if ($key == $row['emailaddresstypeid']){
          echo("<option value=" . $key . " selected>" . $value . "</option>\n");
        } else {
          echo("<option value=" . $key . ">" . $value . "</option>\n");
        }
      }
      echo("</select>\n");
      echo '</td>';

      // Email Address
      echo '<td><input type="text" class="form-control" name="emailaddress" value="' . $row['emailaddress'] . '"></td>';

      // Confidentiality Level
      echo '<td>';
      echo('<select id="confidentialitylevelid" name="confidentialitylevelid">\n');
      foreach($code_confidentialitylevel as $key=>$value) {
        if ($key == $row['confidentialitylevelid']){
          echo("<option value=" . $key . " selected>" . $value . "</option>\n");
        } else {
          echo("<option value=" . $key . ">" . $value . "</option>\n");
        }
      }
      echo("</select>\n");
      echo '</td>';

      echo '<input type="hidden" class="form-control" name="datasourceid" value="' . $row['datasourceid'] . '">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<td><a class="btn btn-danger" href="person_emailaddresses.php?personid=' . $personid . '" role="button">Cancel</a></td>';
      echo '</form>';
    } else {
      echo "<td>" . $code_emailaddresstypes[$row['emailaddresstypeid']] . "</td>";
      echo "<td>" . $row['emailaddress'] . "</td>";
      echo "<td>" . $code_confidentialitylevel[$row['confidentialitylevelid']] . "</td>";
      echo '<td><a class="btn btn-primary" href="person_emailaddresses.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
      echo '<td><a class="btn btn-danger" href="person_emailaddresses_delete.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
    }
    echo "</tr>";
  }
?>
