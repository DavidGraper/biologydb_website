<?php
require_once "db.inc.php";
ini_set("display_errors", "1");

include "person_advisees_static_codetables.php";
include "person_advisees_createadviseelist.php";
include "biologydbheader.php";

$personid = $_GET["personid"];

$sql = "select firstname, lastname from data_persons where id=" . $personid;
$result = $conn->query($sql);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	$personname = $row['firstname'] . ' ' . $row['lastname'];
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Biology Department Database</title>
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
	</head>
	<body>
		<!-- Header -->
		<?php insertpageheader(); ?>
		
		<!-- Horizontal Navbar -->
		<?php inserthorizontalnavbar("People"); ?>
		
		<div class="container-fluid" style="margin-top:30px">
			<div class="row">
				<div class="col-sm-2 bg-light">
		
				<!-- Vertical Navbar -->
				<?php insertpersonverticalnavbar($personid, "Advisees"); ?>
		
				</div>
				<div class="col-sm-10">		
					<h3>Biology Person "<?php echo $personname; ?>" Advisees</h3>
					<br/>
					<table class="table">
						<thead>
							<tr>
								<th>Advisee</th>
								<th>Start Date</th>
								<th>End Date</th>
							</tr>
						</thead>
						<tbody>
						    <?php include "person_advisees_read.php"; ?>
						</tbody>
					</table>
					<br>
					<br>
					<br>
					<br>
					<hr/>
					<br>
					<h4>Add New Advisee:</h4>
					<br>
					<form class="form-horizontal" action="person_advisees_create.php" method="POST">
						<div class="form-group">
							<label class="control-label col-lg-3" for="adviseeid">Advisor:</label>
							<div class="col-lg-9">
							    <?php
							    echo '<select id="adviseeid" name="adviseeid">\n';
							    foreach ($advisees as $adviseeid => $adviseevalue) {
								    echo "<option value=" . $adviseeid . ">" . $adviseevalue . "</option>";
							    }
							    echo '</select>'
							    ?>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-3" for="startdate">Start Date:</label>
							<div class="col-lg-9">
								<input type="date" class="form-control m-2" id="startdate" name="startdate">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-3" for="enddate">End Date:</label>
							<div class="col-lg-9">
								<input type="date" class="form-control m-2" id="enddate" name="enddate">
							</div>
						</div>

						<input type="hidden" id="datasourceid" name="datasourceid" value=1>

						<?php
						echo '<input type="hidden" id="personid" name="personid" value=' . $personid . ">";
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
		<br/>
		<div class="jumbotron text-center" style="margin-bottom:0">
			<p>Biology Department Database</p>
		</div>

	</body>


</html>
