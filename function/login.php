<?php

/**
    ~~~~~~~~~~~~~~~ Login/Load Function ~~~~~~~~~~~~~~~
    
    Description:
    *This function loads the player data and logs in.

    Helpful Information:
    *Saves are serialized so storing and loading can be done effectively

*/

include('/load_classes.php');

session_start();

$username = strtolower($_POST["username"]);

if (preg_match('/[^A-Za-z0-9\d]/', $username))
{
    header('Location: ../register.php?error=3');
    die();
    //special characters found error
}

$userfile = glob("../saves/$username/player");
if (count($userfile) == 0){
    header('Location: ../register.php?error=4');
    die();
    //account does not exist error
}

$_SESSION['player'] = unserialize(file_get_contents("../saves/$username/player"));

$password = $_SESSION['player']->password;
$hashed_password =  hash("sha256", $_POST["password"], false);

if ($password != $hashed_password){
    header('Location: ../register.php?error=5'); 
    die();
    //Wrong password error
}

$_SESSION['loggedin'] = true;

header('Location: ../index.php');


?>