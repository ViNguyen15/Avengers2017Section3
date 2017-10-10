<?php
class Monster{

	public $healthPoints;
	public $strength;
	public $name;
	public $description;
	public $id;
	public $itemDrops = array();
	public $goldAmount;

	public function __construct($id, $name, $description, $strength, $healthPoints, $itemDrops, $goldAmount){
		$this->description=$description;
		$this->strength=$strength;
		$this->healthPoints=$healthPoints;
		$this->id = $id;
		$this->itemDrops = $itemDrops;
		$this->goldAmount = $goldAmount;
	}

	public function receiveDamage($amount){
		$this->$healthPoints -= $amount;
		// logic for when health reaches 0,
	}


}

?>
