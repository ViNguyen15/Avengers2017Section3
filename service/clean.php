<?php 
/* 
Purpose: Function to clean data
Description: This file contains a single function that takes data and removes any characters that may make problems within the code.
Uses: Cleans username and password fields so malicious code cannot be injected into PHP.

Date-Modified: 9/18/2017
Modified by: Ammar
*/

function clean($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
	$data = str_replace('"', '', $data);
	$data = str_replace('\'', '', $data);
	$data = str_replace(';', '', $data);
	$data = str_replace('?', '', $data);
	return $data;
}

?>