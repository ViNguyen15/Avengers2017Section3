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

// WEAPONS

//$itemList[] = Weapon::createWeapon($id, $name, $description, $type, $buyValue $sellValue, $power, $accuracy);
$itemList[] = Weapon::createWeapon(5, "Plasma Knife", "Very common self-defense weap-on popular among colonists.", "weapon", 50, 25, 1, 70);
$itemList[] = Weapon::createWeapon(6, "Plasma Sword", "Old weapon mainly found in museums around the colony, no longer common place but more powerful than the knife.", "weapon", 400, 200, 3, 50);
$itemList[] = Weapon::createWeapon(7, "Plasma Pistol", "Inexpensive gun used by colony law enforcement to protect from space pirates. Easy to find in shops.", "weapon", 700, 350, 7, 40);
$itemList[] = Weapon::createWeapon(8, "Laser Rifle", "Military grade weaponry used by colony militia’s. Expensive.", "weapon", 1200, 600, 4, 90);
$itemList[] = Weapon::createWeapon(9, "Rocket Launcher", "Very powerful weapon only used by highly trained soldiers. The limited availability of this weapon makes it expensive in shops.", "weapon", 2200, 1100, 20, 35);

//ARMOR

//$itemList[] = Armor::createArmor( $id, $name, $description, $type, $buyValue, $sellValue, $defence);
$itemList[] = Armor::createArmor( 10, "Pilot suit", "Standard leather clothing all pilots use. It’s not very protective", "armor", 100, 50, 1);
$itemList[] = Armor::createArmor( 11, "Law Enforcement Gear", "Protective gear worn by colony law enforcement, it offers decent protection", "armor", 1400, 700, 3);
$itemList[] = Armor::createArmor( 12, "Military gear", "Protective gear worn by colony law military officers, it offers good protection", "armor", 2200, 1100, 5);

// SHIP PARTS

$itemList[] = Item::createItem(13, "Radar", "A piece of the ship that allows us to detect objects in space.", "part", 1, 1);
$itemList[] = Item::createItem(14, "Cockpit", "A piece of the ship that allows us to pilot the ship.", "part", 1, 1);
$itemList[] = Item::createItem(15, "Engine", "We need this to power the ship!", "part", 1, 1);
$itemList[] = Item::createItem(16, "Communication Network", "We need this to communicate.", "part", 1 , 1);
$itemList[] = Item::createItem(17, "Wings", "We need this to fly the ship.", "part", 1, 1);
$itemList[] = Item::createItem(18, "Defense Turret", "We need this to protect the ship.", "part", 1, 1);
/**
    ~~~~~~~~~~~~~~~ Default Inventory ~~~~~~~~~~~~~~~
    Description:
    *Below is the inventory the player will spawn with.

    Helpful Information:
    *Used in the create_user function.

*/
//$allitems = array_merge( $itemList , $weaponList , $itemList );

//$default_inv = $allitems;
$default_inv = $itemList;
$default_inv[0]->changeAmt(50);



?>
