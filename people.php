<?php
require_once "db.inc.php";
ini_set("display_errors", "1");

include "biologydbheader.php";
include "people_createcodelists.php";

$show = $_GET["show"];

$biologypersontypes = getbiologypersontypes();
$biologyjobtitles = getbiologyjobs();
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
		<?php inserthorizontalnavbar("People"); ?>
		
		<div class="container-fluid" style="margin-top:30px">
			<div class="row">

				<!-- Vertical Navbar -->
				<?php insertpeopleverticalnavbar($show); ?>
				
				<div class="col-sm-10">
					<h3>Biology People</h3>
<?php if ($show == 'all') {
	echo '<h5>Listing of all Biology People including Faculty, Graduate Students, and Staff</h5>';
} ?>
<?php if ($show == 'faculty') {
	echo '<h5>Listing of all Biology Faculty</h5>';
} ?>
<?php if ($show == 'gradstudents') {
	echo '<h5>Listing of all Biology Graduate Students</h5>';
} ?>
<?php if ($show == 'staff') {
	echo '<h5>Listing of all Biology Staff</h5>';
} ?>
					<br/>
					<table class="table">
						<thead>
							<tr>
								<th>Lastname</th>
								<th>Firstname</th>
								<th>Job Title</th> </tr>
						</thead>
						<tbody>
<?php include "people_read.php"; ?>
						</tbody>
					</table>
					<br>
					<br>
					<br>
					<br>
					<hr/>
					<br>
					<h4>Add New Person:</h4>
					<br>
					<form class="form-horizontal" action="people_create.php?show=$show" method="POST">
						<div class="form-group">
							<label  class="control-label col-lg-3" for="lastname">Last Name:</label>
							<div class="col-lg-9">
								<input type="text" class="form-control m-2" id="lastname" name="lastname">
							</div>
						</div>

						<div class="form-group">
							<label  class="control-label col-lg-3" for="firstname">First Name:</label>
							<div class="col-lg-9">
								<input type="text" class="form-control m-2" id="firstname" name="firstname">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-3" for="biologypersontype">Biology Person Type:</label>
							<div class="col-lg-9">
							    <?php
							    echo '<select id="biologypersontypeid" name="biologypersontypeid">\n';
							    foreach ($biologypersontypes as $biologypersontypeid => $biologypersontypevalue) {
								    echo "<option value=" . $biologypersontypeid . ">" . $biologypersontypevalue . "</option>";
							    }
							    echo '</select>'
							    ?>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-3" for="biologyjob">Biology Job Title:</label>
							<div class="col-lg-9">
							    <?php
							    echo '<select id="biologyjobtitleid" name="biologyjobtitleid">\n';
							    foreach ($biologyjobtitles as $biologyjobtitleid => $biologyjobtitlevalue) {
								    echo "<option value=" . $biologyjobtitleid . ">" . $biologyjobtitlevalue . "</option>";
							    }
							    echo '</select>'
							    ?>
							</div>
						</div>	

<?php

echo '<input type="hidden" id="personid" name="personid" value=' . $personid . ">";
echo '<input type="hidden" id="show" name="show" value=' . $show . ">";

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
			<p>Biology Database - People</p>
		</div>

	</body>


</html>
