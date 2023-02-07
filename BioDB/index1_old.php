<?php

$arrFiles = glob('/mnt/o_drive/Office/*');

foreach ($arrFiles as $filename) {
	echo($filename . "\n");
}

?>
