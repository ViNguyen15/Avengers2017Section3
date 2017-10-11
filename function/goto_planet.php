<?php

foreach (glob("../classes/*.php") as $class) {
    include("$class");
}

session_start();
if(isset($_GET['room'])){
    $_SESSION['location'] = findPlanet($_SESSION['game'],$_GET['room']);
}

if(isset($_GET['system'])){
    $_SESSION['location'] = $_SESSION['game'][$_GET['system']];
}




function findPlanet($planets,$id){
    foreach ($planets as $planet){ 
        foreach ($planet->rooms as $room){
            if ($room->id == $id){
                return $planet;
            }
        }
    }
}


header('location: ../');


?>