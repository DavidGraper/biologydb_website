<?php
require_once "db.inc.php";
ini_set("display_errors", "1");

include "biologydbheader.php";

$show = $_GET["show"];
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
		<?php inserthorizontalnavbar("Rooms"); ?>
		
		<div class="container-fluid" style="margin-top:30px">
			<div class="row">

				<!-- Vertical Navbar -->
				<?php insertroomsverticalnavbar($show); ?>
				
				<div class="col-sm-10">
					<h3>Biology Rooms</h3>
					<br/>
					<table class="table">
						<thead>
							<tr>
								<th>Room Number</th>
								<th>Room Name</th>
								<th>Building</th> 
							</tr>
						</thead>
						<tbody>
<?php include "rooms_read.php"; ?>
						</tbody>
					</table>
					<br>
					<br>
					<br>
					<br>
					<hr/>
					<br>
					<h4>Add New Room:</h4>
					<br>
					<form class="form-horizontal" action="rooms_create.php?show=all" method="POST">



						<div class="form-group">
							<label class="control-label col-lg-3" for="buildingid">Email Address Type:</label>
							<div class="col-lg-9">
							    <?php
							    echo '<select id="buildingid" name="buildingid">\n';
							    foreach ($code_universitybuildings as $key => $value) {
								    echo "<option value=" . $key . ">" . $value . "</option>\n";
							    }
							    echo "</select>\n";
							    ?>
							</div>
						</div>

						<div class="form-group">
							<label  class="control-label col-lg-3" for="roomnumber">Room Number:</label>
							<div class="col-lg-9">
								<input type="text" class="form-control m-2" id="roomnumber" name="roomnumber">
							</div>
						</div>

						<div class="form-group">
							<label  class="control-label col-lg-3" for="longname">Room Name:</label>
							<div class="col-lg-9">
								<input type="text" class="form-control m-2" id="longname" name="longname">
							</div>
						</div>

<?php
echo '<input type="hidden" id="roomid" name="roomid" value=' . $roomid . ">";
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
