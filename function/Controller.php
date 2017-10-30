<?php
foreach (glob("../interface/*.php") as $interface) {
    include("$interface");
}
foreach (glob("../classes/*.php") as $class) {
    include("$class");
}
session_start();

$func = $_GET['func'];
if (isset($_GET['id'])){
	$id = $_GET['id'];
	$_SESSION['player']->$func("$id");
} else {
	$_SESSION['player']->$func();
}

?>