<?php
include('load_classes.php');
session_start();

$func = $_GET['func'];
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$_SESSION['player']->$func("$id");
} else {
	$_SESSION['player']->$func();
}

?>