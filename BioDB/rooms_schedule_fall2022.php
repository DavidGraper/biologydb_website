<?php
require_once "db.inc.php";
ini_set("display_errors", "1");

include "biologydbheader.php";
include "rooms_schedule_createroomschedulelists.php";

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


		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
                        google.charts.load("current", {packages: ["timeline"]});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                            var container = document.getElementById('example5.1');
                            var chart = new google.visualization.Timeline(container);
                            var dataTable = new google.visualization.DataTable();
                            dataTable.addColumn({type: 'string', id: 'Room'});
                            dataTable.addColumn({type: 'string', id: 'Name'});
                            dataTable.addColumn({type: 'date', id: 'Start'});
                            dataTable.addColumn({type: 'date', id: 'End'});
                            dataTable.addRows([
<?php
$fall2022classes = getclassschedulerows(2022, "Fall", "M");

foreach ($fall2022classes as $value) {
	echo($value . ",");
}
?>
                            ]);

                            var options = {
                                timeline: {colorByRowLabel: true},
                                hAxis: {format: 'hh:mm'}
                            };

                            chart.draw(dataTable, options);
                            var container1 = document.getElementById('example5.2');
                            var chart1 = new google.visualization.Timeline(container1);
                            var dataTable1 = new google.visualization.DataTable();
                            dataTable1.addColumn({type: 'string', id: 'Room'});
                            dataTable1.addColumn({type: 'string', id: 'Name'});
                            dataTable1.addColumn({type: 'date', id: 'Start'});
                            dataTable1.addColumn({type: 'date', id: 'End'});
                            dataTable1.addRows([
<?php
$fall2022classes = getclassschedulerows(2022, "Fall", "T");

foreach ($fall2022classes as $value) {
	echo($value . ",");
}
?>
                            ]);

                            var options = {
                                timeline: {colorByRowLabel: true},
                                hAxis: {format: 'hh:mm'}
                            };

                            chart1.draw(dataTable1, options);
                            var container2 = document.getElementById('example5.3');
                            var chart2 = new google.visualization.Timeline(container2);
                            var dataTable2 = new google.visualization.DataTable();
                            dataTable2.addColumn({type: 'string', id: 'Room'});
                            dataTable2.addColumn({type: 'string', id: 'Name'});
                            dataTable2.addColumn({type: 'date', id: 'Start'});
                            dataTable2.addColumn({type: 'date', id: 'End'});
                            dataTable2.addRows([
<?php
$fall2022classes = getclassschedulerows(2022, "Fall", "W");

foreach ($fall2022classes as $value) {
	echo($value . ",");
}
?>
                            ]);

                            var options = {
                                timeline: {colorByRowLabel: true},
                                hAxis: {format: 'hh:mm'}
                            };

                            chart2.draw(dataTable2, options);
                            var container3 = document.getElementById('example5.4');
                            var chart3 = new google.visualization.Timeline(container3);
                            var dataTable3 = new google.visualization.DataTable();
                            dataTable3.addColumn({type: 'string', id: 'Room'});
                            dataTable3.addColumn({type: 'string', id: 'Name'});
                            dataTable3.addColumn({type: 'date', id: 'Start'});
                            dataTable3.addColumn({type: 'date', id: 'End'});
                            dataTable3.addRows([
<?php
$fall2022classes = getclassschedulerows(2022, "Fall", "TH");

foreach ($fall2022classes as $value) {
	echo($value . ",");
}
?>
                            ]);

                            var options = {
                                timeline: {colorByRowLabel: true},
                                hAxis: {format: 'hh:mm'}
                            };

                            chart3.draw(dataTable3, options);
                            var container4 = document.getElementById('example5.5');
                            var chart4 = new google.visualization.Timeline(container4);
                            var dataTable4 = new google.visualization.DataTable();
                            dataTable4.addColumn({type: 'string', id: 'Room'});
                            dataTable4.addColumn({type: 'string', id: 'Name'});
                            dataTable4.addColumn({type: 'date', id: 'Start'});
                            dataTable4.addColumn({type: 'date', id: 'End'});
                            dataTable4.addRows([
<?php
$fall2022classes = getclassschedulerows(2022, "Fall", "F");

foreach ($fall2022classes as $value) {
	echo($value . ",");
}
?>
                            ]);

                            var options = {
                                timeline: {colorByRowLabel: true},
                                hAxis: {format: 'hh:mm'}
                            };

                            chart4.draw(dataTable4, options);
                        }

		</script>


	</head>
	<body>
		<!-- Header -->
		<?php insertpageheader(); ?>

		<!-- Horizontal Navbar -->
		<?php inserthorizontalnavbar("Classes"); ?>

		<div class="container-fluid" style="margin-top:30px">
			<div class="row">

				<!-- Vertical Navbar -->
				<?php insertclassesverticalnavbar("fall2022"); ?>

				<div class="col-sm-10">

					<h4>Biology Building Classroom Use</h4>
					<h5>Fall Semester 2022</h5>
					<br/>
					<h5>Mondays</h5>
					<br/>
					<div id="example5.1" style="height: 650px;"></div>
					<h5>Tuesdays</h5>
					<br/>
					<div id="example5.2" style="height: 650px;"></div>
					<h5>Wednesdays</h5>
					<br/>
					<div id="example5.3" style="height: 650px;"></div>
					<h5>Thursdays</h5>
					<br/>
					<div id="example5.4" style="height: 650px;"></div>
					<h5>Fridays</h5>
					<br/>
					<div id="example5.5" style="height: 650px;"></div>

				</div>
			</div>
		</div>



		<div class="jumbotron text-center" style="margin-bottom:0">
			<p>Footer</p>
		</div>

	</body>


</html>
