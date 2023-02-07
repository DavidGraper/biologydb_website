<?php
require_once "db.inc.php";
ini_set("display_errors", "1");

include "lab_static_codetables.php";
include "lab_creatememberlist.php";
include "biologydbheader.php";

$labid = $_GET["labid"];
$facultymembers = getfacultylist();
$potentialmembers = getmemberlist();

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
				<?php insertlabverticalnavbar($labid, "General"); ?>	
				
				</div>
				<div class="col-sm-10">		
					<br/>
					<h3>Biology Lab "<?php echo $labname; ?>"</h3>
					<br/>
					<form class="form-horizontal" action="lab_update.php" method="POST">
						<div class="form-group">
							<label class="control-label col-lg-3" for="principalinvestigator">Principal Investigator:</label>
							<div class="col-lg-9">
							    <?php
							    echo '<select id="principalinvestigatorid" name="principalinvestigatorid">\n';
							    foreach ($facultymembers as $facultymemberid => $facultymembervalue) {
								    if ($facultymemberid == (string) $primaryinvestigatorid) {
									    echo "<option selected value=" . $facultymemberid . ">" . $facultymembervalue . "</option>";
								    } else {
//								    	echo "<option value=" . $facultymemberid. ">" . $facultymembervalue . "</option>";
									    echo "<option value=" . $facultymemberid . ">" . $facultymembervalue . "</option>";
								    }
							    }
							    echo '</select>'
							    ?>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-3" for="website">Website:</label>
							<div class="col-lg-9">
								<input type="text" class="form-control m-2" id="website" value="<?php echo $website; ?>" name="website">
							</div>
						</div>
					</form>
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
