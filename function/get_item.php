<?php
foreach (glob("../interface/*.php") as $interface) {
    include("$interface");
}
foreach (glob("../classes/*.php") as $class) {
    include("$class");
}

session_start();


$value = $_GET['item'];
$_SESSION['player']->deleteItemFromMap($value);

header('location: ../');



?>