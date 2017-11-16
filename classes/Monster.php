<?php

class Monster {

    public $healthPoints;
    public $strength;
    public $name;
    public $description;
    public $id;
    public $itemDropId;
    public $itemDropAmount;
    public $goldAmount;

    public function __construct($id, $name, $description, $strength, $healthPoints) {
        $this->description = $description;
        $this->strength = $strength;
        $this->healthPoints = $healthPoints;
        $this->id = $id;
        $this->name = $name;
    }

    public function receiveDamage($amount) {
        $this->healthPoints -= $amount;
        // logic for when health reaches 0,
    }

    // id of item and quantity of item
    public function setItemDrop($id, $amount) {
        $this->itemDropId = $id;
        $this->itemDropAmount = $amount;
    }

    function setGoldAmount($goldAmount) {
        $this->goldAmount = $goldAmount;
    }

}

?>
