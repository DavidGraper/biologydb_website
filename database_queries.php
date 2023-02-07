<?php

include 'db.inc.php';
	
class Lab {
	public $id;
	public $labname;
	public $pi;
	public $website;
}

class Committee {
	public $id;
	public $committeename;
	public $committeecategory;
}

class Person {
	public $id;
	public $lastname;
	public $firstname;
}

function getadvisorlist2() {

    include 'db.inc.php';

    $sql = "select id, lastname, firstname from data_persons "
	    . "where id in "
	    . "(select distinct advisorid from data_person_academicadvisors) "
	    . "and active=1 "
	    . "order by lastname";
    $result = $conn->query($sql);

    $advisorlist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $advisorlist[$row['id']] = $row['lastname'] . ", " . $row['firstname'];
    }

    return $advisorlist;
  }
  
function getadviseelist($advisorid) {

    include 'db.inc.php';

    $sql = "select b.id, b.lastname, b.firstname from data_person_academicadvisors a "
	    . " join data_persons b on a.adviseeid = b.id"
	    . " where a.advisorid = " . $advisorid
	    . " order by b.lastname";
    $result = $conn->query($sql);

    $memberlist = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $memberlist[$row['id']] = $row['lastname'] . ", " . $row['firstname'];
    }

	return $memberlist;
}

function getlabinfo() {

	include 'db.inc.php';

	$sql = "select a.id, a.labname, a.website, b.firstname, b.lastname "
		. "from data_labs a "
		. "join data_persons b "
		. "on a.primaryinvestigatorid =b.id "
		. "order by a.labname";

	$result = $conn->query($sql);

	$lablist = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$object = new Lab();
		$object->id = $row['id'];
		$object->labname = $row['labname'];
		$object->pi = $row['firstname'] . " " . $row['lastname'];
		$object->website = $row['website'];

		array_push($lablist, $object);
	}

	return $lablist;
}

function getlabphones($labid) {

	include 'db.inc.php';

	$sql = "select id, phonenumber from data_lab_phones "
		. "where labid = " . $labid;

	$result = $conn->query($sql);

	$labphones = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$labphones[$row['id']] = $row['phonenumber'];
	}

	return $labphones;
}

function getlabrooms($labid) {

	include 'db.inc.php';

	$sql = "select a.id, b.roomnumber from data_lab_rooms a "
		. "join data_rooms b  "
		. "on a.roomid = b.id "
		. "where a.labid = " . $labid . " "
		. "order by b.roomnumber";

	$result = $conn->query($sql);

	$labrooms = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$labrooms[$row['id']] = $row['roomnumber'];
	}

	return $labrooms;
}

function getlabmembers($labid) {

	include 'db.inc.php';

	$sql = "select b.id, b.firstname, b.lastname from data_lab_persons a " .
		"join data_persons b " .
		"on a.personid = b.id " .
		"where a.labid = " . $labid . " " .
		"order by b.lastname";

	$result = $conn->query($sql);

	$labmembers = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$labmembers[$row['id']] = $row['firstname'] . " " . $row['lastname'];
	}

	return $labmembers;
}

function getcommitteeinfo() {

	include 'db.inc.php';

	$sql = "select a.id, cc.committeetype, a.committeename from code_committees a"
		. " join code_committeetypes cc on a.committeetypeid = cc.id"
		. " order by cc.committeetype, a.committeename";

	$result = $conn->query($sql);

	$committeelist = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$object = new Lab();
		$object->id = $row['id'];
		$object->committeename = $row['committeename'];
		$object->committeetype = $row['committeetype'];

		array_push($committeelist, $object);
	}

	return $committeelist;
}

function getcommitteemembers($committeeid) {

	include 'db.inc.php';

	$sql = "select a.id, b.lastname, b.firstname, a.chair from data_person_committees a " .
		"join data_persons b on a.personid = b.id " .
		"where a.committeeid = " . $committeeid . " " .
		"order by a.chair desc, b.lastname";

	$result = $conn->query($sql);

	$committeemembers = array();
	$chair = "";

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

		if ($row['chair'] == 1) {
			$chair = "(Chair)";
		} else {
			$chair = "";
		}

		$committeemembers[$row['id']] = $row['firstname'] . " " . $row['lastname'] . ' ' . $chair;
	}

	return $committeemembers;
}

function getpeople($peopletypeid) {

	include 'db.inc.php';
	
	$sql = "select id, lastname, firstname from data_persons "
		. "where biologypersontypeid = " . $peopletypeid . " "
		. "and active = 1 order by lastname";

	$result = $conn->query($sql);

	$personlist = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		$personlist[$row['id']] = $row['lastname'] . ", " . $row['firstname'];
	}

	return $personlist;
}

function getpersonemailaddresses($personid) {

	include 'db.inc.php';
	
	$sql = "select a.id, a.emailaddress, b.emailclassname from data_person_emailaddresses a " .
		"join code_emailaddresstypes b " .
		"on a.emailaddresstypeid=b.id ".
		"where a.personid = " . $personid . " " .
		"order by b.emailclassname desc";

	$result = $conn->query($sql);

	$emailaddresses = array();

	$emailtype = "";
		
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

		if ($row['emailclassname'] == "University") {
			$emailtype = "";
		} else {
			$emailtype = "(Personal)";
		}

		array_push($emailaddresses, $row['emailaddress'] . " " . $emailtype);
	}

	return $emailaddresses;
}

function getpersonphones($personid) {

	include 'db.inc.php';

	$sql = "select a.id, a.phonenumber, b.phoneclassname from data_person_phones a " 
		.  "join code_phonetypes b " 
		.  "on a.phonetypeid = b.id " 
		.  "where a.personid = " . $personid . " " 
		.  "order by b.phoneclassname desc"; 
	
	$result = $conn->query($sql);

	$phones = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		array_push($phones, $row['phonenumber'] . " (" . $row['phoneclassname'] . ")");
	}

	return $phones;
}

function getpersonlabmemberships($personid){

	include 'db.inc.php';

	$sql = "select a.id, b.labname, c.role from data_lab_persons a "
		. "join data_labs b "
		. "on a.labid = b.id "
		. "join code_labrole c "
		. "on a.labroleid = c.id "
		. "where a.personid = " . $personid;
	
	$result = $conn->query($sql);

	$labmemberships = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		array_push($labmemberships, $row['labname'] . " (" . $row['role'] . ")");
	}

	return $labmemberships;
}

function getpersonadvisors($personid){

	include 'db.inc.php';

	$sql = "select a.id, b.lastname from data_person_academicadvisors a "
		. "join data_persons b "
		. "on a.advisorid = b.id "
		. "where a.adviseeid = " . $personid . " "
		. "order by b.lastname";
	
	$result = $conn->query($sql);

	$advisors = array();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		array_push($advisors, $row['lastname']);
	}

	return $advisors;
}

?>
  
