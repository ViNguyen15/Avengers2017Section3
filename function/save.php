<?php

foreach (glob("classes/*.php") as $class) {
    include("$class");
}
//Include all of the classes

//error_reporting(-1);
//ini_set('display_errors', 'On');

session_start();

$u = $_SESSION['username'];

$myfile = fopen("../saves/$u/data.php", "w+") or die("Unable to open file!"); //open file for writing
$txt = '<?php 
        $save_username = "'.$_SESSION['username'].'"; 
        $save_password = "'.$_SESSION['password'].'";
        ?>';
fwrite($myfile, $txt);
fclose($myfile);

/*
foreach ($inventory as $item){
    if (!existsInArray($item, $_SESSION['inventory'])){
        $_SESSION['inventory'][] = $item;
    }
}
*/

file_put_contents("../saves/$u/player",serialize($_SESSION['player']));

header('Location: ../index.php?save=1');

function existsInArray($entry, $array) {
    foreach ($array as $compare) {
        if ($compare->name == $entry->name) {
            return true;
        }
    }
    return false;
}
?>