<?php

/**
    ~~~~~~~~~~~~~~~ Save Function ~~~~~~~~~~~~~~~
    
    Description:
    *This function saves the player session to the user file.

    Helpful Information:
    *Saves are serialized so storing and loading can be done effectively

*/
include('/load_classes.php');

session_start();

$username = $_SESSION['player']->name;
file_put_contents("../saves/$username/player",serialize($_SESSION['player']));

header('Location: ../index.php?save=1');

?>