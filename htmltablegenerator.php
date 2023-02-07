<?php

function generatehtmltablerow($cells){
	
	$returnstring = "<tr>";
	
	foreach ($cells as $cell) {
		$returnstring .= "<td>" . $cell . "</td>";
	}

	$returnstring .= "</tr>";
	
	return $returnstring;

	}

?>


