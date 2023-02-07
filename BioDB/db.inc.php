<?php
$dbhost = "localhost";
$dbname = "biologydb";
$dbuser = "root";
$dbpass = "";

try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
} catch (PDOException $err) {
  echo "Database connection problem. ". $err->getMessage();
  exit();
}
?>
