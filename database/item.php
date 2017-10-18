<?php

/**
    ~~~~~~~~~~~~~~~ Item Database ~~~~~~~~~~~~~~~
    
    Description:
    *This class creates the items that will be in the game. If it is not here, it does not exist.

    Helpful Information:
    *Each item should have a different ID.
	*ID's should not change.
	*Names and descriptions are what will be displayed in the inventory.

*/

$itemList = array();

$itemList[] = Item::createItem(0,"Gold","System wide currency.","money",1,1);
$itemList[] = Item::createItem(1,"Medicine","Sophisticated medicine capable of healing half of the body’s wounds.","health",50,25);
$itemList[] = Item::createItem(2,"Elixir","Very advanced medicine capable of healing all of the body’s wounds.","health",100,50);
$itemList[] = Item::createItem(3,"Mineral","Resource found mainly on mining colonies. Used to make materials.","raw",500,250);
$itemList[] = Item::createItem(4,"Rare Mineral","Rare resource found mainly on mining colonies. Used to make higher end materials.","raw",1000,500);

$weaponList = array();

//$weaponList[] = Weapon::createWeapon($id, $name, $description, $type, $buyValue, $sellValue, $power, $upgradeValue);
$weaponList[] = Weapon::createWeapon(5, "Plasma Knife", "Very common self-defense weap-on popular among colonists.", "weapon", 50, 25, 1, 1);
$weaponList[] = Weapon::createWeapon(6, "Plasma Sword", "Old weapon mainly found in museums around the colony, no longer common place but more powerful than the knife.", "weapon", 125, 65, 3, 2);
$weaponList[] = Weapon::createWeapon(7, "Plasma Pistol", "Inexpensive gun used by colony law enforcement to protect from space pirates. Easy to find in shops.", "weapon", 250, 125, 5, 3);
$weaponList[] = Weapon::createWeapon(8, "Laser Rifle", "Military grade weaponry used by colony militia’s. Expensive.", "weapon", 600, 300, 7, 5);
$weaponList[] = Weapon::createWeapon(9, "Rocket Launcher", "Very powerful weapon only used by highly trained soldiers. The limited availability of this weapon makes it expensive in shops.", "weapon", 1000, 750, 9, 8);

$armorList = array();

//$armorList[] = Armor::createArmor( $id, $name, $description, $type, $buyValue, $sellValue, $defence);
$armorList[] = Armor::createArmor( 10, "Pilot suit", "Standard leather clothing all pilots use. It’s not very protective", "armor", 50, 25, 1);
$armorList[] = Armor::createArmor( 11, "Law Enforcement Gear", "Protective gear worn by colony law enforcement, it offers decent protection", "armor", 150, 75, 3);
$armorList[] = Armor::createArmor( 12, "Military gear", "Protective gear worn by colony law military officers, it offers good protection", "armor", 350, 175, 5);

?>
