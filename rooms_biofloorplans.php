<?php
require_once "db.inc.php";
ini_set("display_errors", "1");

include "biologydbheader.php";

$show = $_GET["show"];
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Biology Database Biology Floorplans</title>
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
				    <?php
				    if ($show == "biologyfloorplans") {
					    echo("<h3>Biology Rooms</h3>");
					    echo("<br/>");
					    echo('<p><a href="floorplans\BI_00_2017.pdf" target=\"_blank\">Biology Ground Floor</a></p>');
					    echo('<p><a href="floorplans\BI_01_2017.pdf" target=\"_blank\">Biology First Floor</a></p>');
					    echo('<p><a href="floorplans\BI_02_2017.pdf" target=\"_blank\">Biology Second Floor</a></p>');
					    echo('<p><a href="floorplans\BI_03_2017.pdf" target=\"_blank\">Biology Third Floor</a></p>');
				    } elseif ($show == "lifesciencesfloorplans") {
					    echo("<h3>Life Science Building Rooms</h3>");
					    echo("<br/>");
					    echo('<p><a href="floorplans\LS_01_2016.pdf" target=\"_blank\">Life Science Research Building First Floor</a></p>');
					    echo('<p><a href="floorplans\LS_02_2016.pdf" target=\"_blank\">Life Science Research Building Second Floor</a></p>');
				    }
				    
					    echo("<br/>");
					    echo("<br/>");
					    echo("<br/>");
					    echo("<br/>");
					    echo("<br/>");
				    ?>


				</div>
			</div>
		</div>

		<div class = "jumbotron text-center" style = "margin-bottom:0">
			<p>Footer</p>


	</body>


</html>
