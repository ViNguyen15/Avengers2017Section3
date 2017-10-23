
<?php
/**
index.php
 */
$game = $_SESSION['player']->game;
//echo $_SESSION['game']->name;

if (!isset($_SESSION['location'])){
    $_SESSION['location'] = $game[2]->rooms[3];
}
$_SESSION['location']->display();

?>