<?php

/**
Used to equip weapons and armor to player
Used in: N/A
Accesses: database/item.php
*/


function equip_gear($id, $player){
	switch ($id){
		case 5:
			$player->equipWeapon($id);
			// echo Plasma knife equipped
			break;
		case 6:
			$player->equipWeapon($id);
			// echo plasma sword
			break;
		case 7:
			$player->equipWeapon($id);
			// echo echo plasma pistol
			break;
		case 8:
			$player->equipWeapon($id);
			// echo laser rifle
			break;
		case 9:
			$player->equipWeapon($id);
			// echo rocket launcher
			break;
		case 10:
			$player->equipArmor($id);
			// echo pilot suit
			break;
		case 11:
			$player->equipArmor($id);
			//echo law enforcement gear
		case 12:
			$player->equipArmor($id);
			// echo military gear
			break;
		default:
			//  should not run.. wrong id
	}
}
?>