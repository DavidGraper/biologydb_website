<?php
require_once "db.inc.php";
ini_set("display_errors", "1");

include "bio_createroomlist.php";
include "biologydbheader.php";

$labid = $_GET["labid"];

$sql = "select a.*, b.lastname, b.firstname from data_labs a join data_persons b on a.primaryinvestigatorid = b.id where a.id=" . $labid;
$result = $conn->query($sql);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	$primaryinvestigatorid = $row['primaryinvestigatorid'];
	$personname = $row['firstname'] . ' ' . $row['lastname'];
	$labname = $row['labname'];
	$website = $row['website'];
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Biology Database</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<style>
			.fakeimg {
			    height: 200px;
			    background: #aaa;
			}
		</style>
		<script>

                        $(document).ready(function () {
                            $("#btnUpdate").click(function () {
                                // disable button
                                $(this).prop("disabled", true);
                                // add spinner to button
                                $(this).html(
                                        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading`
                                        );
                            });
                        });
		</script>
	</head>
	<body>
		<!-- Header -->
		<?php insertpageheader(); ?>

		<!-- Horizontal Navbar -->
		<?php inserthorizontalnavbar("Labs"); ?>

		<div class="container-fluid">
			<div class="row">
				
				<div class="col-sm-2 bg-light">';
					
				<!-- Vertical Labs Navbar -->
				<?php insertlabverticalnavbar($labid, "Rooms"); ?>	
				
				</div>
				
				<div class="col-sm-10">	
					<br/>
					<h3>Biology Lab "<?php echo $labname; ?>" Rooms</h3>
					<br/>
					<table class="table">
						<thead>
							<tr>
								<th>Lab Room</th>
							</tr>
						</thead>
						<tbody>
						    <?php include "lab_rooms_read.php"; ?>
						</tbody>
					</table>
					<br>
					<br>
					<br>
					<br>
					<hr/>
					<br>
					<h4>Add New Lab Room:</h4>
					<br>
					<form class="form-horizontal" action="lab_rooms_create.php" method="POST">
						<div class="form-group">
							<label class="control-label col-lg-3" for="roomid">Room:</label>
							<div class="col-lg-9">
							    <?php

							    $roomlist = getroomlist();
							    
							    echo '<select id="roomid" name="roomid">\n';
							    foreach ($roomlist as $key => $value) {
								    echo "<option value=" . $key . ">" . $value . "</option>\n";
							    }
							    echo "</select>\n";
							    ?>
							</div>
						</div>
						<?php
						echo '<input type="hidden" id="labid" name="labid" value=' . $labid . ">";
						?>
						<div class="form-group>"
						     <label class="control-label col-lg-3">&nbsp;</label>
							<div class="col-lg-12 col-lg-offset-3">
								<button type="submit" class="btn btn-primary">Add</button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
		<div class="jumbotron text-center" style="margin-bottom:0">
			<p>Footer</p>
		</div>

	</body>


</html>
