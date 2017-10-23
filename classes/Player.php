<?php

/**
~~~~~~~~~~~~~~~ Planets Database ~~~~~~~~~~~~~~~
    
    Description:
    *This class holds all of the information that will be saved and used by the player.

    Helpful Information:

*/

class Player{
	
	public $test = "TEST TEXT";
	public $name;
	public $inventory = array();
	public $location;
	public $game;

	public $healthMax;
	public $healthPoints;
	public $strength;
	public $equippedWeapon; // Weapon 
	public $equippedArmor; // Armor

	public function __construct(){

	}

	public function addItemToInventory($addedItem){
		foreach ($this->inventory as $item) {
			if ($addedItem->id == $item->id){
				$item->amount += $addedItem->amount;
				break;
			}
		}
	}
	public function deleteItemFromMap($dropid){  
		foreach ($this->game as $planet){
			foreach ($planet->rooms as $room){
				foreach ($room->items as $i => $item){
					if ($item->dropid == $dropid){
						$this->addItemToInventory($item);
						unset($room->items[$i]);
						break 3;
					}
				}
			}
		}
	}

	
	public function receiveDamage($amount){
		$this->healthPoints -= $amount;
		// logic for when health reaches 0,
	}

	// idk how you want to handle this stuff, these are just ideas
	public function heal($amount){
		if ($this->healthPoints + $amount > $this->healthMax){
			$this->healthPoints = $this->healthMax;
		}
		else {
			$this->healthPoints += $amount;
		}
	}



	public function equipWeapon($id){
		$this->unequipWeapon();
		//$this->equippedWeapon = // get weapon from database or inventory

	}

	public function unequipWeapon(){
		// should still be in inventory
		$this->equippedWeapon = NULL;
	}

	public function equipArmor($id){
		$this->unequipArmor();
		//$this->equippedArmor = // get armor from database or inventory;
	}

	public function unequipArmor(){
		// stays in inventory
		$this->equippedArmor = NULL;
	}

	public function displayInventory(){
		foreach ($this->inventory as $item){

			if ($item->amount > 0 || $item->id==0){  
			//Remove any items that are at 0 value
			echo "<item onmouseover='displayDescription(this)' onmouseout='removeDescription(this)'> 
				<img src='./images/items/$item->id.png' height='32' width='32'>
				<description><b><u>$item->name</u></b> <br> $item->description</description>
				<amount>x$item->amount</amount>
				</item>";
			}
		}
	}
}

?>
