<?php

/**
	Holds information for items
	Used in: 
	Accesses: classes/item.php
*/

#    _____ _                       _       _        _
#   |_   _| |                     | |     | |      | |
#     | | | |_ ___ _ __ ___     __| | __ _| |_ __ _| |__   __ _ ___  ___
#     | | | __/ _ \ '_ ` _ \   / _` |/ _` | __/ _` | '_ \ / _` / __|/ _ \
#    _| |_| ||  __/ | | | | | | (_| | (_| | || (_| | |_) | (_| \__ \  __/
#   |_____|\__\___|_| |_| |_|  \__,_|\__,_|\__\__,_|_.__/ \__,_|___/\___|
#
#   Each item must have a different name and a different ID. Do not change ID's and names as it will break old users.

$inventory = array();

$inventory[] = Item::inventoryItem(0,"Gold","System wide currency.","money",1,1);
$inventory[] = Item::inventoryItem(1,"Medicine","Sophisticated medicine capable of healing half of the body’s wounds.","health",50,25);
$inventory[] = Item::inventoryItem(2,"Elixir","Very advanced medicine capable of healing all of the body’s wounds.","health",100,50);
$inventory[] = Item::inventoryItem(3,"Mineral","Resource found mainly on mining colonies. Used to make materials.","raw",500,250);
$inventory[] = Item::inventoryItem(4,"Rare Mineral","Rare resource found mainly on mining colonies. Used to make higher end materials.","raw",1000,500);

$weaponList = array();

//$weaponList[] = Weapon::createWeapon($id, $name, $description, $type, $buyValue, $sellValue, $power, $upgradeValue);
$weaponList[] = Weapon::createWeapon(0, "Plasma Knife", "Very common self-defense weap-on popular among colonists.", "weapon", 50, 25, 1, 1);
$weaponList[] = Weapon::createWeapon(1, "Plasma Sword", "Old weapon mainly found in museums around the colony, no longer common place but more powerful than the knife.", "weapon", 125, $65, 3, 2);
$weaponList[] = Weapon::createWeapon(2, "Plasma Pistol", "Inexpensive gun used by colony law enforcement to protect from space pirates. Easy to find in shops.", "weapon", 250, 125, 5, 3);
$weaponList[] = Weapon::createWeapon(3, "Laser Rifle", "Military grade weaponry used by colony militia’s. Expensive.", "weapon", 600, 300, 7, 5);
$weaponList[] = Weapon::createWeapon(4, "Rocket Launcher", "Very powerful weapon only used by highly trained soldiers. The limited availability of this weapon makes it expensive in shops.", "weapon", 1000, 750, 9, 8);

?>
