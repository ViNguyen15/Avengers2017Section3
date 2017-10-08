<?php

foreach (glob("../classes/*.php") as $class) {
    include("$class");
}

session_start();

$_SESSION['location'] = $_GET['room'];;

header('location: ../');


?>