<?php

include 'db.inc.php';

$personid = $_GET['personid'];
$show = $_GET['show'];

$sql = "delete from data_persons where id=$personid";

echo $sql;

$conn->query($sql);
header("location: people.php?show=" . $show);

?>
