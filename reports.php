<?php

require_once "db.inc.php";

ini_set("display_errors", "1");

include "biologydbheader.php";

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
		<?php inserthorizontalnavbar("Reports"); ?>

		<div class="container-fluid" style="margin-top:30px">
			<div class="row">

				<div class="col-sm-2 bg-light">
					
				<!-- Vertical Labs Navbar -->
				<?php insertreportsverticalnavbar(); ?>
				
				</div>
				
				<div class="col-sm-10">
					<h3>Reports on People</h3>
					<br/>
					<table class="table">
						<thead>
							<tr>
								<th>Report Name</th>
								<th>Description</th>
								<th>View/Download</th>
						</thead>
						<tbody>
						    <tr>
							<td>Advisors/Advisees</td>
							<td>Listing of faculty advisors and their advisees</td>
							<td><a href="reportgenerate_advisors.php">View Report</a></td>
						    </tr>
						    <tr>
							<td>Committee Assignments</td>
							<td>Listing of committees and committee members</td>
							<td><a href="reportgenerate_committees.php">View Report</a></td>
						    </tr>
						    <tr>
							<td>Contact Information</td>						    
							<td>Directory of faculty member contact information</td>
							<td><a href="reportgenerate_contactinfo_faculty.php">View Report</a></td>
						    </tr>
						    <tr>
							<td>&nbsp;</td>
							<td>Directory of graduate student contact information</td>
							<td><a href="reportgenerate_contactinfo_gradstudents.php">View Report</a></td>
						    </tr>						    <tr>
							<td>&nbsp;</td>
							<td>Directory of staff member contact information</td>
							<td><a href="reportgenerate_contactinfo_staff.php">View Report</a></td>
						    </tr>
						    <tr>
							<td>Labs</td>
							<td>Listing of labs, lab information, and members</td>
							<td><a href="reportgenerate_labs.php">View Report</a></td>
						    </tr>

						    
						</tbody>
					</table>
					<br>
					<br>
					<br>
					<br>
				</div>
			</div>
		</div>
		<div class="jumbotron text-center" style="margin-bottom:0">
			<p>Footer</p>
		</div>

	</body>


</html>
