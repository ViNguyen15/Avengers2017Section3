<?php
class Player{

	public $healthMax;
	public $healthPoints;
	public $strength;
	public $name;
	public $inventory = array();
	public $location;
	public $game;

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


}

?>
