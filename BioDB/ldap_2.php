<?php
// check http://www.forumsys.com/tutorials/integration-how-to/ldap/online-ldap-test-server/

// Active Directory server
$ldap_host = "univ.albany.edu";

// connect to active directory
$ldapconn = ldap_connect($ldap_host) or die("Could not connect to LDAP Server");

//user dn

$supplieduserid = $_POST["username"];
$suppliedpassword = $_POST["password"];

$ldapadmin = "uid=gauss,dc=example,dc=com";
$ldapadmin = "uid=" . $supplieduserid . ",ou=biology,ou=cas,ou=active,ou=people,dc=univ,dc=albany,dc=edu";
//$ldapadmin = "cn=" . $supplieduserid . ",ou=biology,ou=cas,ou=active,ou=people,dc=univ,dc=albany,dc=edu";
//$ldapadmin = "uid=" . $supplieduserid . ",dc=univ,dc=albany,dc=edu";
//$ldapadmin = "uid=" . $supplieduserid;
$ldapadmin = $supplieduserid;


// Password
$ldappass = "password";
$ldappass = $suppliedpassword;

echo $ldapadmin;
echo "<br/>";
echo $ldappass;
echo "<br/>";

// set connection is using protocol version 3, if not will occur warning error.
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

if ($ldapconn) {
	// binding to ldap server
	$ldapbind = ldap_bind($ldapconn, $ldapadmin, $ldappass);

	// verify binding
	if ($ldapbind){
		echo "LDAP bind successful…";
	} else {
		echo "LDAP bind failed…";
	}

}