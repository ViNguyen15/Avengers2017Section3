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

$inventory[] = new Item(0,"Gold","System wide currency.",1 ,"money",1, 1);
$inventory[] = new Item(1,"Medicine","Sophisticated medicine capable of healing half of the body’s wounds.", 25,"health",0, 50);
$inventory[] = new Item(2,"Elixir","Very advanced medicine capable of healing all of the body’s wounds.", 50,"health",0, 100);
$inventory[] = new Item(3,"Mineral","Resource found mainly on mining colonies. Used to make materials.", 250,"raw", 0, 500);
$inventory[] = new Item(4,"Rare Mineral","Rare resource found mainly on mining colonies. Used to make higher end materials.", 500,"raw", 0, 1000);

?>
