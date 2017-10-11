<?php
include "../classes/Monster.php";

$monsterList = new array();
$monsterList[] = new Monster(0, "Space Pirate", "Infamous space pirates known for causing havoc system wide. They are despised by all colonies. They are armored with light weaponry and armor.", 2, 10, itemdrop array, 25);
$monsterList[] = new Monster(1, "Space-Pirate Captain" ,"Commander of all space pirates in the solar System. He is heavily armored and has powerful weaponry.", 4, 50, itemdrop array, 100);
$monsterList[] = new Monster(2, "Defense Drone", "These defense drones were created to defend research stations from space pirates, however an evil scientist has hacked them and turned them against the player! They attack with a deadly laser but are somewhat weak.", 1, 5, itemdrop array, 25);
$monsterList[] = new Monster(3, "Mad Scientist" , "This evil scientist has been hired by the pace pirates to steal technology from research stations. He has hacked defense drones to do his bidding", 3, 30, itemdrop array, 200);
$monsterList[] = new Monster(4, "Kraken", "Huge green sea creature that resides in an ocean moon of Neptune. Frequently terrorizes colonists with its spiky tentacles", 3, 40, itemdrop array, 300);
$monsterList[] = new Monster(5, "Fire Giants" ,"Fire resistant monsters native to volcanic moons.", 3, 35, itemdrop array, 150);
$monsterList[] = new Monster(6, "Worn-out Robot", "Old robot that you find on the surface of earth. It’s not very strong.", 1, 5, itemdrop array, 10);
$monsterList[] = new Monster(7, "Ruffians" ,"Thieves that disrupt and steal from colonists", 1, 6, itemdrop array, 50);
//$monsterList[] = new Monster(id, name ,description, strength, healthpoints, itemdrop array, goldamount);


 ?>