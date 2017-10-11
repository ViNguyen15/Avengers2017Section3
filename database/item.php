<?php
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

?>
