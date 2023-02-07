
<?php

// using ldap bind
$ldaprdn  = 'uname';     // ldap rdn or dn
$ldaprdn = 'CN=dg145254,OU=Biology,OU=CAS,OU=Active,OU=People,DC=univ,DC=albany,DC=edu';
$ldaprdn = 'CN=dg145254,OU=Biology,OU=CAS,OU=Active,OU=People';
$ldaprdn = 'CN=dg145254';
$ldaprdn = 'dg145254';


$ldappass = 'password';  // associated password
$ldappass = 'cqcy{WGV3c}2';  // associated password

echo "1";

// connect to ldap server
//$ldapconn = ldap_connect("ldap://ldap.example.com")
$ldapconn = ldap_connect("ldap://univ.albany.edu")
    or die("Could not connect to LDAP server.");

echo "2";

echo $ldapconn;


if ($ldapconn) {

    // binding to ldap server
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

    // verify binding
    if ($ldapbind) {
        echo "LDAP bind successful...";
    } else {
        echo "LDAP bind failed...";
    }

}

?>
