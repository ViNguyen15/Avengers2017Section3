<?php
class Item{
    // define properties
    public $id;
    public $name;
    public $description;
    public $type;
    public $amount;
    public $sellValue;
    public $buyValue;


    public function __construct() {

    }

    public $dropid;
    public static function itemDrop( $id , $amount , $dropid ) {
        $instance = new self();
        $instance->id = $id;
        $instance->amount = $amount;
        $instance->dropid = $dropid;
        return $instance;
    }
    public static function inventoryItem( $id, $name, $description, $type, $buyValue, $sellValue ) {
        $instance = new self();
        $instance->id=$id;
        $instance->name=$name;
        $instance->description=$description;
        $instance->type=$type;
        $instance->amount=0;
		$instance->buyValue=$buyValue;
        $instance->sellValue=$sellValue;
        return $instance;
    }
    public static function playerItem ($id, $amount) {
        $instance = new self();
        $instance->id=$id;
        $instance->amount=$amount;
    }

/*
    public function __clone() {

    }
*/
    

    // define methods
    public function changeAmt($value){
        $this->amount += $value;
    }

}

/**
    Weapon class
    Used in: database/item.php
    Accesses: Item class - classes/item.php
 */
class Weapon extends Item {
    private $power; // int damage of weapon
    private $level; // int upgrade level. starts at 0, +1 for each upgrade
    private $upgradeValue; // int amount that weapon increases by for every upgrade
    private $upgradeCost; // int cost of minerals that it takes to upgrade weapon. increases by 1 for every upgrade 

    public static function createWeapon( $id, $name, $description, $type, $buyValue, $sellValue, $power, $upgradeValue) {
        $instance = new self();
        $instance->id=$id;
        $instance->name=$name;
        $instance->description=$description;
        $instance->type=$type;
        $instance->amount=0;
        $instance->buyValue=$buyValue;
        $instance->sellValue=$sellValue;
        $instance->power = $power;
        $instance->upgradeValue = $upgradeValue;
        $instance->level=0;
        $instance->upgradeCost = 1;
        return $instance;
    }

    public function upgradeWeapon(){
        $this->power += $upgradeValue;
        $this->level += 1;
        $this->upgradeCost += 1;
        // need logic somewhere for reduce minerals in player inventory
    }

    public function getPower(){
        return $this->power;
    }

    public function getLevel(){
        return $this->level;
    }

    public function getUpgradeValue(){
        return $this->upgradeValue;
    }

    public function getUpgradeCost(){
        return $this->upgradeCost;
    }

}
?>
