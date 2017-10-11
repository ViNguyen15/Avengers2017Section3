<?php

foreach (glob("../classes/*.php") as $class) {
    include("$class");
}

session_start();

unset($_SESSION['location']);


header('location: ../');


?>