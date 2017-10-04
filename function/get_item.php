<?php

include('../classes/Planet.php');
include('../classes/Room.php');
include('../classes/Item.php');

session_start();

$value = $_GET['item'];
$values = explode(",", $value);

foreach ($_SESSION['inventory'] as $item){
    if ($item->name == $values[0]){
        $item->changeAmt((int)$values[1]);
    }
}
header('location: ../');


?>