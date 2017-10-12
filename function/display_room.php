
<?php
/**
index.php
 */
$game = $_SESSION['game'];


if (!isset($_SESSION['location'])){
    $_SESSION['location'] = $_SESSION['game'][2]->rooms[3];
}
$_SESSION['location']->display();

?>