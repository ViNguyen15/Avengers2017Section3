<?php
class Player{

	public $healthMax;
	public $healthPoints;
	public $strength;
	public $name;
	public $inventory = array();
	public $location;
	public $game;
	public $equippedWeapon; // Weapon 
	public $equippedArmor; // Armor

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


	// idk how you want to handle this stuff, these are just ideas
	public function heal($amount){
		if ($this->healthPoints + $amount > $this->healthMax){
			$this->healthPoints = $this->healthMax;
		}
		else {
			$this->healthPoints += $amount;
		}
	}

	 public function removeItem($index){  
		// remove from inventory array
	 }

	public function equipWeapon($id){
		$this->unequipWeapon();
		$this->equippedWeapon = // get weapon from database or inventory

	}

	public function unequipWeapon(){
		// should still be in inventory
		$this->equippedWeapon = NULL;
	}

	public function equipArmor($id){
		$this->unequipArmor();
		$this->equippedArmor = // get armor from database or inventory;
	}

	public function unequipArmor(){
		// stays in inventory
		$this->equippedArmor = NULL;
	}
}

?>
