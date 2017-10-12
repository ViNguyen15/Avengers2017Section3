<?php
class Player{

	public $healthMax;
	public $healthPoints;
	public $strength;
	public $name;
	public $inventory = array();
	public $location;
	public $game;
	public $equippedWeapon;
	public $equippedArmor;

	public function __construct(){

	}

	public function receiveDamage($amount){
		$this->healthPoints -= $amount;
		// logic for when health reaches 0,
	}

	public function addItem($addedItem){
		foreach ($this->inventory as $item) {
			if ($addedItem->id == $item->id){
				$item->amount += $addedItem;
				break;
			}
		}
	}

	public function setLocation($location){
		$this->location = $location;
	}

	public function heal($amount){
		if ($this->healthPoints + $amount > $this->healthMax){
			$this->healthPoints = $this->healthMax;
		}
		else {
			$this->healthPoints += $amount;
		}
	}

	// public function removeItem($index){ // index of item in inventory array
		
	// }

}

?>
