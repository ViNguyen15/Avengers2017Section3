<?php

foreach (glob("../classes/*.php") as $class) {
    include("$class");
}

session_start();


$value = $_GET['item'];
$values = explode(",", $value);
$location = explode(":",$_SESSION['location']);



foreach ($_SESSION['inventory'] as $item){
    if ($item->id == $values[0]){
        $item->changeAmt((int)$values[1]);
    }
}

foreach ($_SESSION['game'] as $planet) {
    foreach ($planet->rooms as $room){
        if ($room->id==$location[1]) {
            foreach ($room->items as $i => $item){
                if ($item->dropid == $values[2]){
                    unset($room->items[$i]);
                }
            }
        }
    }
}

header('location: ../');


?>