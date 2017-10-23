<?php
foreach (glob("../interface/*.php") as $interface) {
    include("$interface");
}
foreach (glob("../classes/*.php") as $class) {
    include("$class");
}

session_start();

$_SESSION['player']->gotoRoom($_GET['room']);

header('location: ../');


?>