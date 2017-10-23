<?php
foreach (glob("../interface/*.php") as $interface) {
    include("$interface");
}
foreach (glob("../classes/*.php") as $class) {
    include("$class");
}

session_start();

$game = $_SESSION['player']->game;
$_SESSION['location'] = findroom($game,$_GET['room']);


function findRoom($planets,$id){
    foreach ($planets as $planet){ 
        foreach ($planet->rooms as $room){
            if ($room->id == $id){
                return $room;
            }
        }
    }
}

header('location: ../');


?>