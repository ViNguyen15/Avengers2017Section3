<?php

/**
~~~~~~~~~~~~~~~ Planets Database ~~~~~~~~~~~~~~~
    
    Description:
    *This class holds all of the information that will be saved and used by the player.

    Helpful Information:

*/

class Player{
	
	private $name;
	private $inventory = array();
	private $location;
	private $game;

	public $healthMax;
	public $healthPoints;
	public $strength;
	public $equippedWeapon; // Weapon 
	public $equippedArmor; // Armor

	public function __construct(){

	}

	public function setName($name){
		$this->name->$name;
	}
	public function getName(){
		return $this->name;
	}
	public function setGame($game){
		$this->game->$game;
	}
	public function getGame(){
		return $this->game;
	}
	public function setLocation($location){
		$this->location = $location;
	}
	public function getLocation(){
		return $this->location;
	}
	public function setInventory($inventory){
		$this->inventory = $inventory;
	}
	public function getInventory(){
		return $this->inventory;
	}

	public function addItem($addedItem){
		foreach ($this->inventory as $item) {
			if ($addedItem->id == $item->id){
				$item->amount += $addedItem;
				break;
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

	 public function removeItem($index){  
		// remove from inventory array
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

}

?>
