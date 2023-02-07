<?php

function insertpageheader(){
	echo '<div class="jumbotron text-center" style="margin-bottom:0">';
	echo '<h1>Biology Department Database</h1>';
	echo '</div>';
}

function inserthorizontalnavbar($active) {
	echo '		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">';
	echo '			<a class="navbar-brand" href="#">Database Section:</a>';
	echo '			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">';
	echo '				<span class="navbar-toggler-icon"></span>';
	echo '			</button>';
	echo '			<div class="collapse navbar-collapse" id="collapsibleNavbar">';
	echo '				<ul class="navbar-nav">';

	echo '					<li class="nav-item">';
	if ($active == "People") {
		echo '						<a class="nav-link active" href="people.php?show=all">People</a>';
	} else {
		echo '						<a class="nav-link" href="people.php?show=all">People</a>';
	}
	echo '					</li>';

	echo '					<li class="nav-item">';
	if ($active == "Rooms") {
		echo '						<a class="nav-link active" href="rooms.php?show=all">Rooms</a>';
	} else {
		echo '						<a class="nav-link" href="rooms.php?show=all">Rooms</a>';
	}
	echo '					</li>';

	echo '					<li class="nav-item">';
	if ($active == "Classes") {
		echo '						<a class="nav-link active" href="rooms_schedule_fall2022.php">Classes</a>';
	} else {
		echo '						<a class="nav-link" href="rooms_schedule_fall2022.php?show=all">Classes</a>';
	}
	echo '					</li> ';

	echo '					<li class="nav-item">';

	if ($active == "Labs") {
		echo '						<a class="nav-link active" href="labs.php">Labs</a>';
	} else {
		echo '						<a class="nav-link" href="labs.php">Labs</a>';
	}
	echo '					</li>';

	echo '					<li class="nav-item">';
	if ($active == "Reports") {
		echo '						<a class="nav-link active" href="reports.php?show=all">Reports</a>';
	} else {
		echo '						<a class="nav-link" href="reports.php?show=all">Reports</a>';
	}
	echo '					</li>';

	echo '				</ul>';
	echo '			</div>  ';
	echo '				</ul>';
	echo '			</div>  ';
	echo '		</nav>';
}

function insertreportsverticalnavbar(){
	echo '<h4>Biology Database Reports</h4>';
	echo '<p>Pick a report to generate/view</p>';
}

function insertlabsverticalnavbar(){
	echo '<h4>Biology Labs</h4>';
	echo '<p>Pick a lab to display</p>';
}

function insertlabverticalnavbar($labid, $active) {

	echo '					<br/>';
	echo '					<h4>Biology Labs</h4>';
	echo '					<p>Lab information</p>';
	echo '					<ul class="nav nav-pills flex-column">';
	echo '						<li class="nav-item">';
	if ($active == "General") {
		echo '							<a class="nav-link active" href="lab_generalinfo.php?labid=' . $labid . '">General Lab Information</a>';
	} else {
		echo '							<a class="nav-link" href="lab_generalinfo.php?labid=' . $labid . '">General Lab Information</a>';
	}
	echo '						</li>';
	echo '						<li class="nav-item">';
	if ($active == "Members") {
		echo '							<a class="nav-link active" href="lab_members.php?labid=' . $labid . '">Lab Members</a>';
	} else {
		echo '							<a class="nav-link" href="lab_members.php?labid=' . $labid . '">Lab Members</a>';
	}
	echo '						</li>';
	echo '						<li class="nav-item">';
	if ($active == "TelephoneNumbers") {
		echo '							<a class="nav-link active" href="lab_telephonenumbers.php?labid=' . $labid . '">Lab Telephone Numbers</a>';
	} else {
		echo '							<a class="nav-link" href="lab_telephonenumbers.php?labid=' . $labid . '">Lab Telephone Numbers</a>';
	}
	echo '						</li>';
	echo '						<li class="nav-item">';
	if ($active == "Rooms") {
		echo '							<a class="nav-link active" href="lab_rooms.php?labid=' . $labid . '">Lab Rooms</a>';
	} else {
		echo '							<a class="nav-link" href="lab_rooms.php?labid=' . $labid . '">Lab Rooms</a>';
	}
	echo '						</li>';
	echo '					</ul>';
}

function insertpersonverticalnavbar($personid, $active) {

	echo '					<h4>Person Attributes</h4>';
	echo '					<p>Pick specific information about person</p>';
	echo '					<ul class="nav nav-pills flex-column">';

	echo '						<li class="nav-item">';
	if ($active == "Advisees") {
		echo '							<a class="nav-link active" href="person_advisees.php?personid=' . $personid . '">Advisees</a>';
	} else {
		echo '							<a class="nav-link" href="person_advisees.php?personid=' . $personid . '">Advisees</a>';
	}
	echo '						</li>';

	echo '						<li class="nav-item">';
	if ($active == "Advisors") {
		echo '							<a class="nav-link active" href="person_advisors.php?personid=' . $personid . '">Advisors</a>';
	} else {
		echo '							<a class="nav-link" href="person_advisors.php?personid=' . $personid . '">Advisors</a>';
	}
	echo '						</li>';

	echo '						<li class="nav-item">';
	if ($active == "BiologyDegrees") {
		echo '							<a class="nav-link active" href="person_biologydegrees.php?personid=' . $personid . '">Biology Degrees</a>';
	} else {
		echo '							<a class="nav-link" href="person_biologydegrees.php?personid=' . $personid . '">Biology Degrees</a>';
	}
	echo '						</li>';

	echo '						<li class="nav-item">';
	if ($active == "BiologyJobTitles") {
		echo '							<a class="nav-link active" href="person_biologyjobtitles.php?personid=' . $personid . '">Biology Job Titles</a>';
	} else {
		echo '							<a class="nav-link" href="person_biologyjobtitles.php?personid=' . $personid . '">Biology Job Titles</a>';
	}
	echo '						</li>';

	echo '						<li class="nav-item">';
	if ($active == "Committees") {
		echo '							<a class="nav-link active" href="person_committees.php?personid=' . $personid . '">Committees</a>';
	} else {
		echo '							<a class="nav-link" href="person_committees.php?personid=' . $personid . '">Committees</a>';
	}
	echo '						</li>';

	echo '						<li class="nav-item">';
	if ($active == "Documents") {
		echo '							<a class="nav-link active" href="person_documents.php?personid=' . $personid . '">Documents</a>';
	} else {
		echo '							<a class="nav-link" href="person_documents.php?personid=' . $personid . '">Documents</a>';
	}
	echo '						</li>';
	
	echo '						<li class="nav-item">';
	if ($active == "Education") {
		echo '							<a class="nav-link active" href="person_education.php?personid=' . $personid . '">Education</a>';
	} else {
		echo '							<a class="nav-link" href="person_education.php?personid=' . $personid . '">Education</a>';
	}
	echo '						</li>';

	echo '						<li class="nav-item">';
	if ($active == "EmailAddresses") {
		echo '							<a class="nav-link active" href="person_emailaddresses.php?personid=' . $personid . '">Email Addresses</a>';
	} else {
		echo '							<a class="nav-link" href="person_emailaddresses.php?personid=' . $personid . '">Email Addresses</a>';
	}
	echo '						</li>';

	echo '						<li class="nav-item">';
	if ($active == "Ethnicities") {
		echo '							<a class="nav-link active" href="person_ethnicities.php?personid=' . $personid . '">Ethnicity</a>';
	} else {
		echo '							<a class="nav-link" href="person_ethnicities.php?personid=' . $personid . '">Ethnicity</a>';
	}
	echo '						</li>';

	echo '						<li class="nav-item">';
	if ($active == "KeypadCodes") {
		echo '							<a class="nav-link active" href="person_keypadcodes.php?personid=' . $personid . '">Keypad Codes</a>';
	} else {
		echo '							<a class="nav-link" href="person_keypadcodes.php?personid=' . $personid . '">Keypad Codes</a>';
	}
	echo '						</li>';

	echo '						<li class="nav-item">';
	if ($active == "Notes") {
		echo '							<a class="nav-link active" href="person_notes.php?personid=' . $personid . '">Notes</a>';
	} else {
		echo '							<a class="nav-link" href="person_notes.php?personid=' . $personid . '">Notes</a>';
	}
	echo '						</li>';

	echo '						<li class="nav-item">';
	if ($active == "Rooms") {
		echo '							<a class="nav-link active" href="person_rooms.php?personid=' . $personid . '">Rooms</a>';
	} else {
		echo '							<a class="nav-link" href="person_rooms.php?personid=' . $personid . '">Rooms</a>';
	}
	echo '						</li>';
	
	echo '						<li class="nav-item">';
	if ($active == "Settings") {
		echo '							<a class="nav-link active" href="person_settings.php?personid=' . $personid . '">Settings</a>';
	} else {
		echo '							<a class="nav-link" href="person_settings.php?personid=' . $personid . '">Settings</a>';
	}
	echo '						</li>';

	echo '						<li class="nav-item">';
	if ($active == "StreetAddresses") {
		echo '							<a class="nav-link active" href="person_streetaddresses.php?personid=' . $personid . '">Street Addresses</a>';
	} else {
		echo '							<a class="nav-link" href="person_streetaddresses.php?personid=' . $personid . '">Street Addresses</a>';
	}
	echo '						</li>';

	echo '						<li class="nav-item">';
	if ($active == "StudentRequirements") {
		echo '							<a class="nav-link active" href="person_studentrequirements.php?personid=' . $personid . '">Student Requirements</a>';
	} else {
		echo '							<a class="nav-link" href="person_studentrequirements.php?personid=' . $personid . '">Student Requirements</a>';
	}
	echo '						</li>';

	echo '						<li class="nav-item">';
	if ($active == "TelephoneNumbers") {
		echo '							<a class="nav-link active" href="person_telephonenumbers.php?personid=' . $personid . '">Telephone Numbers</a>';
	} else {
		echo '							<a class="nav-link" href="person_telephonenumbers.php?personid=' . $personid . '">Telephone Numbers</a>';
	}
	echo '						</li>';

	echo '					</ul>';
}

function insertpeopleverticalnavbar($active) {
	echo '<div class="col-sm-2 bg-light">';
	echo '<h4>Display People</h4>';
	echo '<p>Pick types of people to display.</p>';
	echo '<ul class="nav nav-pills flex-column">';
	echo '<li class="nav-item">';
	if ($active == "all") {
		echo '<a class="nav-link active" href="people.php?show=all">All People</a>';
	} else {
		echo '<a class="nav-link" href="people.php?show=all">All People</a>';
	}
	echo '</li>';

	echo '<li class="nav-item">';
	if ($active == "faculty") {
		echo '<a class="nav-link active" href="people.php?show=all">Faculty</a>';
	} else {
		echo '<a class="nav-link" href="people.php?show=faculty">Faculty</a>';
	}
	echo '</li>';

	echo '<li class="nav-item">';
	if ($active == "gradstudents") {
		echo '<a class="nav-link active" href="people.php?show=all">Graduate Students</a>';
	} else {
		echo '<a class="nav-link" href="people.php?show=gradstudents">Graduate Students</a>';
	}
	echo '</li>';

	echo '<li class="nav-item">';
	if ($active == "staff") {
		echo '<a class="nav-link active" href="people.php?show=all">Staff</a>';
	} else {
		echo '<a class="nav-link" href="people.php?show=staff">Staff</a>';
	}
	echo '</li>';

	echo '</ul>';
	echo '<hr class="d-sm-none">';
	echo '</div>';
}

function insertroomsverticalnavbar($active) {
	echo '<div class="col-sm-2 bg-light">';
	echo '<h4>Display Rooms</h4>';
	echo '<p>Pick types of rooms to display.</p>';
	echo '<ul class="nav nav-pills flex-column">';
	echo '<li class="nav-item">';
	if ($active == "all") {
		echo '<a class="nav-link active" href="rooms.php?show=all">All Rooms</a>';
	} else {
		echo '<a class="nav-link" href="rooms.php?show=all">All Rooms</a>';
	}
	echo '</li>';

	echo '<li class="nav-item">';
	if ($active == "biology") {
		echo '<a class="nav-link active" href="rooms.php?show=biology">Rooms in Biology Building</a>';
	} else {
		echo '<a class="nav-link" href="rooms.php?show=biology">Rooms in Biology Building</a>';
	}
	echo '</li>';

	echo '<li class="nav-item">';
	if ($active == "lifesciences") {
		echo '<a class="nav-link active" href="rooms.php?show=lifesciences">Rooms in Life Sciences Building</a>';
	} else {
		echo '<a class="nav-link" href="rooms.php?show=lifesciences">Rooms in Life Sciences Building</a>';
	}
	echo '</li>';

	echo '</ul>';
	echo '<br/>';
	echo '<br/>';
	echo '<hr class="d-sm-none">';
	echo '<h4>Display Floorplans</h4>';
	echo '<p>Pick building floorplans to display.</p>';
	echo '<ul class="nav nav-pills flex-column">';

	echo '<li class="nav-item">';
	if ($active == "biologyfloorplans") {
		echo '<a class="nav-link active" href="rooms_biofloorplans.php?show=biologyfloorplans">Biology Building Floorplans</a>';
	} else {
		echo '<a class="nav-link" href="rooms_biofloorplans.php?show=biologyfloorplans">Biology Building Floorplans</a>';
	}
	echo '</li>';

	echo '<li class="nav-item">';
	if ($active == "lifesciencesfloorplans") {
		echo '<a class="nav-link active" href="rooms_biofloorplans.php?show=lifesciencesfloorplans">Life Sciences Building Floorplans</a>';
	} else {
		echo '<a class="nav-link" href="rooms_biofloorplans.php?show=lifesciencesfloorplans">Life Sciences Building Floorplans</a>';
	}
	echo '</li>';
	echo '</ul>';
	echo '</div>';
}

function insertclassesverticalnavbar($active) {
	echo '<div class="col-sm-2 bg-light">';
	echo '<h4>Display Class/Room Schedules</h4>';
	echo '<p>Pick Semester to display.</p>';
	echo '<ul class="nav nav-pills flex-column">';
	echo '<li class="nav-item">';
	if ($active == "fall2022") {
		echo '<a class="nav-link active" href="rooms_schedule_fall2022.php">Fall 2022</a>';
	} else {
		echo '<a class="nav-link" href="rooms_schedule_fall2022.php">Fall 2022</a>';
	}
	echo '</li>';

	echo '<li class="nav-item">';
	if ($active == "spring2023") {
		echo '<a class="nav-link active" href="rooms_schedule_spring2023.php">Spring 2023</a>';
	} else {
		echo '<a class="nav-link" href="rooms_schedule_spring2023.php">Spring 2023</a>';
	}
	echo '</li>';

	echo '</ul>';

	echo '</div>';
}

?>
