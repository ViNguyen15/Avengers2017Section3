<?php
/**
    ~~~~~~~~~~~~~~~ Create User Function ~~~~~~~~~~~~~~~
    
    Description:
    *This function creates a user.

    Helpful Information:
    *Users are saved under the /saves/ file as their respective username
    *Names do not contain special characters

*/
$username = strtolower($_POST["username"]);
$pwd = $_POST["password"];
$pwd2 = $_POST["password2"];
//Idenfiying variables for making code cleaner.

if (preg_match('/[^A-Za-z0-9\d]/', $username))
{
    header('Location: ../register.php?error=3');
    die();
    //special characters found error
}

if(($pwd!=$pwd2)||($pwd=="")){
    header('Location: ../register.php?error=2');
    die();
    //Passwords do not match error
}

$userfile = "../saves/$username";
if (!is_dir($userfile) === false){ 
    header('Location: ../register.php?error=1');
    die();
    //User already exists error
}

//Checks if the user already exists
mkdir("../saves/$username");

include('../function/load_classes.php');
include('../database/item.php');
include('../database/rooms.php');

session_start();

$player = new Player;
$player->name = $username;
$player->password = hashPassword($pwd);
$player->game = $rooms;           //Game information (From database/rooms)
$player->location = $default_room;          //Default Room (From database/rooms)
$player->inventory = $default_inv;  //Default inv (From database/items)

$_SESSION['player'] = $player;

file_put_contents("../saves/$username/player",serialize($player));

header('Location: ../index.php');


function hashPassword($pwd){
    return hash("sha256", $pwd, false); 
}
?>