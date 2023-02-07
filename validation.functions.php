<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function isValidDate($date_string)
{

if (strtotime($date_string)) {
	return true;   
} else {
	return false;
}

}

