<?php 
foreach (glob("../interface/*.php") as $interface) {
    include("$interface");
}
foreach (glob("../classes/*.php") as $class) {
    include("$class");
}

session_start();

$direction = $_REQUEST['direction'];


if ($direction == 1){
	$_SESSION['player']->move_y(1);
} elseif ($direction == 2){
	$_SESSION['player']->move_x(1);
} elseif ($direction == 3){
	$_SESSION['player']->move_y(-1);
} elseif ($direction == 4){
	$_SESSION['player']->move_x(-1);
}

echo $direction;

//header('location: index.php');


?>