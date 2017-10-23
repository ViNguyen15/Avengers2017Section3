<?php

$u = strtolower($_POST["username"]);
$p = $_POST["password"];
$p2 = $_POST["password2"];
//Idenfiying variables for making code cleaner.

if(($p==$p2)&&($p!="")){

    $a = "../saves/$u"; 
    //creates array of files matching the string
    if (is_dir($a) === false){ 
    //if directory for user does not exist
    mkdir("../saves/$u");
    $myfile = fopen("../saves/$u/data.php", "w+") or die("Unable to open file!"); 
    //open file for writing
    $txt = '<?php 
            $save_username = '.$u.'; 
            $save_password = "'.hashPassword($p).'";
            ?>';
    fwrite($myfile, $txt);
    fclose($myfile);
    //Writes username and password data to the file and then closes it.

    include('../interface/display.php');
    foreach (glob("../classes/*.php") as $class) {
        include("$class");
    }
    include('../database/item.php');    //$Default_Inv comes from here
    include('../database/rooms.php');   //$planets and default room comes from here

    session_start();

    $player = new Player;
    $player->name = $u;
    $player->game = $planets;
    $player->location = $E_R1;
    $player->inventory = $default_inv;

    $_SESSION['player'] = $player;

    $_SESSION['inventory'] = $itemList;

    file_put_contents("../saves/$u/player",serialize($player));

    file_put_contents("../saves/$u/inventory",serialize($_SESSION['inventory']));

    header('Location: ../index.php');
    } else {
    header('Location: ../register.php?error=1');
    //Username file already exists in glob array
    }

} else {
    header('Location: ../register.php?error=2');
    //Passwords do not match
}

function hashPassword($pwd){
    return hash("sha256", $pwd, false); 
}
?>