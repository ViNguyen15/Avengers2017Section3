<?php
class Monster{
	
	public $healthPoints;
	public $strength;
	public $name;
	public $description;
	public $id;
	
	public function __construct($id, $name, $description, $strength, $healthPoints){
		this->name=$name;
		this->description=$description;
		this->strength=$strength;
		this->healthPoints=$healthPoints;
		this->$id;
	}
	
	public function receiveDamage($amount){
		this->$healthPoints -= $amount;
		// logic for when health reaches 0, 
	}
	
	
}

?>