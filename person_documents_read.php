<?php
  include 'db.inc.php';

  $personid = $_GET['personid'];
  $documenttypes = getdocumenttypes();

  $sql = "select a.id, a.personid, a.filename, a.documenttypeid, b.lastname, b.firstname, b.documentfilepath from data_person_documents a "
	  . "join data_persons b on a.personid = b.id where a.personid=" . $personid . " order by a.id";

  $result = $conn->query($sql);

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {

    echo "<tr>";

    if (isset($_GET['id']) and $row['id'] == $_GET['id']) {
      echo '<form class="form-inline m-2" action="person_documents_update.php" method="POST">';
      echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="personid" value="' . $personid . '">';
     
	echo '<td>&nbsp;</td>';
      
      // Document Type
      echo '<td>';
      $currentdocumenttypeid = $row['documenttypeid'];
      echo '<select id="documenttypeid" name="documenttypeid">\n';
      foreach ($documenttypes as $documenttypeid => $documenttypevalue) {
        if ($currentdocumenttypeid == $documenttypeid){
          echo "<option value=" . $documenttypeid . " selected>" . $documenttypevalue . "</option>";
        } else {
          echo "<option value=" . $documenttypeid . ">" . $documenttypevalue . "</option>";
			}
		}
		echo '</td>';

		// Document filename
		if (isset($row['filename']) == 1) {
			echo '<td><input type="text" class="form-control" name="filename" value="' . $row['filename'] . '"></td>';
		} else {
			echo '<td><input type="date" class="form-control" name="filename"></td>';
		}

		echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
		echo '<td><a class="btn btn-danger" href="person_documents.php?personid=' . $personid . '" role="button">Cancel</a></td>';
		echo '</form>';
	} else {

		echo "<td>";

		$completedocumentfilepath = $row['documentfilepath'];
		$completedocumentfilepath .= "\\";
		$completedocumentfilepath .= $row['filename'];

		if (stripos($row['filename'], '.pdf')) {
			echo "<a href='" . $completedocumentfilepath . "' target='_blank'>View PDF</a>";
		} elseif (stripos($row['filename'], '.doc')) {
			echo "<a href='" . $completedocumentfilepath . "' target='_blank'>Download DOC</a>";
		} else {
			echo "&nbsp";
		}
		
		echo "</td>";
		echo "<td>" . $documenttypes[$row['documenttypeid']] . "</td>";
		echo "<td>" . $row['filename'] . "</td>";
		echo '<td><a class="btn btn-primary" href="person_documents.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Update</a></td>';
		echo '<td><a class="btn btn-danger" href="person_documents_delete.php?personid=' . $personid . '&id=' . $row['id'] . '" role="button">Delete</a></td>';
	}
	echo '</tr>';
}
?>
