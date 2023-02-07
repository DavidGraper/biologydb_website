<?php
  include 'db.inc.php';
  include "person_streetaddresses_static_codetables.php";

  $personid = $_GET['personid'];

  $sql = "select * from data_person_addresses where personid=" . $personid . " order by id";
  $result = $conn->query($sql);

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="person_streetaddresses_update.php" method="POST">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $row['personid'] . '">';
      echo '<input type="hidden" name="datasourceid" value="' . $row['datasourceid'] . '">';

      // Address Type
      echo '<td>';
      echo('<select id="addresstypeid" name="addresstypeid">\n');
      foreach($code_addresstypes as $key=>$value) {
        if ($key == $row['addresstypeid']){
          echo("<option value=" . $key . " selected>" . $value . "</option>\n");
        } else {
          echo("<option value=" . $key . ">" . $value . "</option>\n");
        }
      }
      echo("</select>\n");
      echo '</td>';

      // Address
      echo '<td>';
      echo '<table>';
      echo '<tr>';
      echo '<input type="text" class="form-control" name="address0" value="' . $row['address0'] . '">';
      echo '</tr>';
      echo '<tr>';
      echo '<input type="text" class="form-control" name="address1" value="' . $row['address1'] . '">';
      echo '</tr>';
      echo '<tr>';
      echo '<input type="text" class="form-control" name="address2" value="' . $row['address2'] . '">';
      echo '</tr>';
      echo '</table>';
      echo '</td>';

      // City
      echo '<td><input type="text" class="form-control" name="city" value="' . $row['city'] . '"></td>';

      // State
      echo '<td>';
      echo('<select id="stateid" name="stateid">\n');
      foreach($code_states as $key=>$value) {
        if ($key == $row['stateid']){
          echo("<option value=" . $key . " selected>" . $value . "</option>\n");
        } else {
          echo("<option value=" . $key . ">" . $value . "</option>\n");
        }
      }
      echo("</select>\n");
      echo '</td>';

      // Country
      echo '<td>';
      echo('<select id="countryid" name="countryid">\n');
      foreach($code_countries as $key=>$value) {
        if ($key == $row['stateid']){
          echo("<option value=" . $key . " selected>" . $value . "</option>\n");
        } else {
          echo("<option value=" . $key . ">" . $value . "</option>\n");
        }
      }
      echo("</select>\n");
      echo '</td>';

      // Zip
      echo '<td><input type="text" class="form-control" name="zip" value="' . $row['zip'] . '"></td>';

      // Confidentiality
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
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<td><a class="btn btn-danger" href="person_streetaddresses.php?personid=' . $personid . '" role="button">Cancel</a></td>';
      echo '</form>';
    } else {

      // Address type
      echo "<td>" . $code_addresstypes[$row['addresstypeid']] . "</td>";

      // Address
      echo '<td>';
      echo '<table>';
      echo '<tr>';
      echo $row['address0'];
      echo '</tr>';
      echo '<br/>';
      echo '<tr>';
      echo $row['address1'];
      echo '</tr>';
      echo '<br/>';
      echo '<tr>';
      echo $row['address2'];
      echo '</tr>';
      echo '<br/>';
      echo '</table>';
      echo '</td>';

      // City
      echo "<td>" . $row['city'] . "</td>";

      // State
      echo "<td>" . $code_states[$row['stateid']] . "</td>";

      // Country
      echo "<td>" . $code_countries[$row['countryid']] . "</td>";

      // Zip
      echo "<td>" . $row['zip'] . "</td>";

      // Confidentiality
      echo "<td>" . $code_confidentialitylevel[$row['confidentialitylevelid']] . "</td>";

      // Edit and Delete Buttons
      echo '<td><a class="btn btn-primary" href="person_streetaddresses.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
      echo '<td><a class="btn btn-danger" href="person_streetaddresses_delete.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
    }
    echo "</tr>";
  }
?>
