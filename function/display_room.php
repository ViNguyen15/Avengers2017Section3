
<?php
/**
    ~~~~~~~~~~~~~~~ Display Room Function ~~~~~~~~~~~~~~~
    
    Description:
    *This file is to be included on any page you want the room to display.

    Helpful Information:
    *Used in index.php

*/
foreach (glob("../interface/*.php") as $interface) {
    include("$interface");
}
foreach (glob("../classes/*.php") as $class) {
    include("$class");
}
session_start();
$_SESSION['location'] = $_SESSION['player']->location;
$_SESSION['location']->display();

?>