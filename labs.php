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
		<?php inserthorizontalnavbar("Labs"); ?>

		<div class="container-fluid" style="margin-top:30px">
			<div class="row">
				<div class="col-sm-2 bg-light">
					
				<!-- Vertical Labs Navbar -->
				<?php insertlabsverticalnavbar(); ?>
				
				</div>
				
				<div class="col-sm-10">
					<h3>Biology Research Labs</h3>
					<h5>In Biology and Life Sciences Buildings</h5>
					<br/>
					<table class="table">
						<thead>
							<tr>
								<th>Lab Name</th>
								<th>Principal Investigator</th>
						</thead>
						<tbody>
						    <?php include "labs_read.php"; ?>
						</tbody>
					</table>
					<br>
					<br>
					<br>
					<br>
					<hr/>
					<br>
					<h4>Add New Lab:</h4>
					<br>
					<p>TBD</p>	
				</div>
			</div>
		</div>

		<div class="jumbotron text-center" style="margin-bottom:0">
			<p>Footer</p>
		</div>

	</body>


</html>
