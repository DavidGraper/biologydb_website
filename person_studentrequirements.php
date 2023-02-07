<?php
require_once "db.inc.php";
ini_set("display_errors", "1");

include "person_studentrequirements_createcodelists.php";
include "biologydbheader.php";

$personid = $_GET["personid"];
$statuteends = getstatuteendlist();
$exam1assessments = getexam1assessments();
$exam2assessments = getexam2assessments();
$semesters = getsemesters();

$sql = "select firstname, lastname from data_persons where id=" . $personid;
$result = $conn->query($sql);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	$personname = $row['firstname'] . ' ' . $row['lastname'];
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
	</head>
	<body>

<?php

// If academic schedule record does not exist for this person create it
//$sql = "call sp_initacademicschedule(" . $personid . ")";
//$result1 = $conn->query($sql);

// Select academic schedule record current values
$sql = "select * from data_person_academicschedule where personid=" . $personid;
$result = $conn->query($sql);

// Get the current values of the fields for the academic schedule record
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	$id = $row['id'];
	$entrydate = $row['entrydate'];
	$statuteendid = $row['statuteendid'];
	$overallprogress = $row['overallprogress'];	
	$teaching1 = $row['teaching1'];
	$teaching2 = $row['teaching2'];
	$toolcourse = $row['toolcourse'];
	$exam1semesterid = $row['exam1semesterid'];
	$exam1resultid = $row['exam1resultid'];
	$exam2semesterid = $row['exam2semesterid'];
	$exam2resultid = $row['exam2resultid'];
	$selectcommittee = $row['selectcommittee'];
	$advancetocandidacy = $row['advancetocandidacy'];
	$approvaloftopic = $row['approvaloftopic'];
}

?>
		<!-- Header -->
		<?php insertpageheader(); ?>
		
		<!-- Horizontal Navbar -->
		<?php inserthorizontalnavbar("People"); ?>
		
		<div class="container-fluid" style="margin-top:30px">
			<div class="row">
				<div class="col-sm-2 bg-light">
		
				<!-- Vertical Navbar -->
				<?php insertpersonverticalnavbar($personid, "StudentRequirements"); ?>
		
				</div>
				<div class="col-sm-10">		
					<h3>Biology Person "<?php echo $personname; ?>" Student Requirements</h3>
					<br/>
					<h4>Summary:</h4>
					<form class="form-horizontal" action="person_studentrequirements_update.php" method="POST">
						<div class="form-group">
							<label class="control-label col-lg-3" for="entrydate">Entry Date:</label>
							<div class="col-lg-9">
								<input type="date" class="form-control m-2" id="entrydate" name="entrydate" value="<?php echo $entrydate; ?>">
							</div>
						</div>
						<div class="form-group">
							<label  class="control-label col-lg-3" for="statuteendid">Statute End:</label>
							<div class="col-lg-9">
							    <?php
      							    echo '<input type="hidden" name="id" value="' . $id . '">';
							    echo '<select id="statuteendid" name="statuteendid">\n';
							    foreach ($statuteends as $key => $value) {
								if ($key == $statuteendid) {
									echo("<option value=" . $key . " selected>" . $value . "</option>\n");
								} else {
									echo("<option value=" . $key . ">" . $value . "</option>\n");
							    	}
							    }
							    echo '</select>'
							    ?>
							</div>
						</div>
						<div class="form-group">
							<label  class="control-label col-lg-3" for="overallprogress">Overall Progress:</label>
							<div class="col-lg-9">
								<?php 
								echo '<input type="text" class="form-control m-2" id="overallprogress" name="overallprogress" value="' . $overallprogress . '">';
								    ?>
							</div>
						</div>
						<h4>Teaching and Tool Requirements:</h4>
						<div class="form-group">
							<label  class="control-label col-lg-3" for="teaching1">Teaching 1:</label>
							<div class="col-lg-9">
								<input type="text" class="form-control m-2" id="teaching1" name="teaching1" value="<?php echo $teaching1; ?>">
							</div>
						</div>
						<div class="form-group">
							<label  class="control-label col-lg-3" for="teaching2">Teaching 2:</label>
							<div class="col-lg-9">
								<input type="text" class="form-control m-2" id="teaching2" name="teaching2" value="<?php echo $teaching2; ?>">
							</div>
						</div>
						<div class="form-group">
							<label  class="control-label col-lg-3" for="toolcourse">Tool Course:</label>
							<div class="col-lg-9">
								<input type="text" class="form-control m-2" id="toolcourse" name="toolcourse" value="<?php echo $toolcourse; ?>">
							</div>
						</div>
						<h4>Exams</h4>
						<div class="form-group">
							<label  class="control-label col-lg-3" for="exam1semesterid">Exam 1 Semester:</label>
							<div class="col-lg-9">
							    <?php
							    echo '<select id="exam1semesterid" name="exam1semesterid">\n';
							    foreach ($semesters as $key => $value) {
								if ($key == $exam1semesterid) {
									echo("<option value=" . $key . " selected>" . $value . "</option>\n");
								} else {
									echo("<option value=" . $key . ">" . $value . "</option>\n");
							    	}
							    }
							    echo '</select>'
							    ?>
							</div>
						</div>
						<div class="form-group">
							<label  class="control-label col-lg-3" for="exam1resultid">Exam 1 Result:</label>
							<div class="col-lg-9">
							    <?php
							    echo '<select id="exam1resultid" name="exam1resultid">\n';
							    foreach ($exam1assessments as $key => $value) {
								if ($key == $exam1resultid) {
									echo("<option value=" . $key . " selected>" . $value . "</option>\n");
								} else {
									echo("<option value=" . $key . ">" . $value . "</option>\n");
							    	}
							    }
							    echo '</select>'
							    ?>
							</div>
						</div>
						<div class="form-group">
							<label  class="control-label col-lg-3" for="exam2semesterid">Exam 2 Semester:</label>
							<div class="col-lg-9">
							    <?php
							    echo '<select id="exam2semesterid" name="exam2semesterid">\n';
							    foreach ($semesters as $key => $value) {
								if ($key == $exam2semesterid) {
									echo("<option value=" . $key . " selected>" . $value . "</option>\n");
								} else {
									echo("<option value=" . $key . ">" . $value . "</option>\n");
							    	}
							    }
							    echo '</select>'
							    ?>
							</div>
						</div>
						<div class="form-group">
							<label  class="control-label col-lg-3" for="exam2resultid">Exam 2 Result:</label>
							<div class="col-lg-9">
							    <?php
							    echo '<select id="exam2resultid" name="exam2resultid">\n';
							    foreach ($exam2assessments as $key => $value) {
								if ($key == $exam2resultid) {
									echo("<option value=" . $key . " selected>" . $value . "</option>\n");
								} else {
									echo("<option value=" . $key . ">" . $value . "</option>\n");
							    	}
							    }
							    echo '</select>'
							    ?>
							</div>
						</div>
						<div class="form-group">
							<label  class="control-label col-lg-3" for="selectcommittee">Select Committee:</label>
							<div class="col-lg-9">
								<input type="date" class="form-control m-2" id="selectcommittee" name="selectcommittee" value="<?php echo $selectcommittee; ?>">
							</div>
						</div>
						<div class="form-group">
							<label  class="control-label col-lg-3" for="advancetocandidacy">Advance to Candidacy:</label>
							<div class="col-lg-9">
								<input type="date" class="form-control m-2" id="advancetocandidacy" name="advancetocandidacy" value="<?php echo $advancetocandidacy; ?>">
							</div>
						</div>
						<div class="form-group">
							<label  class="control-label col-lg-3" for="approvaloftopic">Approval of Topic:</label>
							<div class="col-lg-9">
								<input type="date" class="form-control m-2" id="approvaloftopic" name="approvaloftopic" value="<?php echo $approvaloftopic; ?>">
							</div>
						</div>
						<input type="hidden" id="datasourceid" name="datasourceid" value=1>

						<?php
						echo '<input type="hidden" id="personid" name="personid" value=' . $personid . ">";
						?>
						<div class="form-group>"
						     <label class="control-label col-lg-3">&nbsp;</label>
							<div class="col-lg-12 col-lg-offset-3">
								<button type="submit" class="btn btn-primary">Update</button>
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
