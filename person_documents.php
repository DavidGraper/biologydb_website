<?php
require_once "db.inc.php";
ini_set("display_errors", "1");

include "person_documents_createcodelists.php";
include "biologydbheader.php";

$personid = $_GET["personid"];

$sql = "select firstname, lastname from data_persons where id=" . $personid;
$result = $conn->query($sql);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	$personname = $row['firstname'] . ' ' . $row['lastname'];
}

$documenttypes = getdocumenttypes();

$sql = "select a.id, a.personid, a.filename, a.documenttypeid, b.lastname, b.firstname "
	. "from data_person_documents a join data_persons b on a.personid = b.id "
	. "where a.personid=" . $personid;

//echo($sql);

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
				<?php insertpersonverticalnavbar($personid, "Documents"); ?>
		
				</div>
				<div class="col-sm-10">		
					<h3>Biology Person "<?php echo $personname; ?>" Documents</h3>
					<br/>
					<table class="table">
						<thead>
							<tr>
								<th>File Type</th>
								<th>Document Type</th>
								<th>Filename</th>
							</tr>
						</thead>
						<tbody>
						    <?php include "person_documents_read.php"; ?>
						</tbody>
					</table>
					<br>
					<br>
					<br>
					<br>
					<hr/>
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
