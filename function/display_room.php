
<?php
/**
    ~~~~~~~~~~~~~~~ Display Room Function ~~~~~~~~~~~~~~~
    
    Description:
    *This file is to be included on any page you want the room to display.

    Helpful Information:
    *Used in index.php

*/

$_SESSION['location'] = $_SESSION['player']->location;
$_SESSION['location']->display();

?>