<?php
/**
Function to ues useable items, so far this is limited to healing items
Used in: N/A
Accesses: database/item.php, classes/Player.php
*/
include "../database/item.php"
// ID of item, Player
public function useItem($id, $player){


	if ($id == 1){
		// player health + half
		$player->heal(($player->healthMax / 2));
		// echo medicine used
	} 
	else if ($id == 2){
		$player->heal($player->healthMax);
		// echo elixir used
	} 
	else {
		// this should not happen wrong id is being used
	}
	// need logic for removing item from inventory somewhere in the game
}
?>