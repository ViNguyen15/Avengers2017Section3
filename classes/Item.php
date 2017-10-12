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
    

    // define methods
    public function changeAmt($value){
        $this->amount += $value;
    }

}
/**
    MapItem class
    Used in: database/rooms.php
 */

class MapItem extends Item {
    public $xcoord;
    public $ycoord;
    public $img;
    public static function create( $id , $amount , $dropid , $coordinate , $img) {
        $instance = new self();
        $instance->id = $id;
        $instance->amount = $amount;
        $instance->dropid = $dropid;
        $coords = explode(",", $coordinate);
        $instance->xcoord = $coords[0];
        $instance->ycoord = $coords[1];
        $instance->img = $img;
        return $instance;
    }
}

/**
    Weapon class
    Used in: database/item.php
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

class Armor extends Item{

    private $defence; // int defensive points of armor

    public static function createArmor( $id, $name, $description, $type, $buyValue, $sellValue, $defence) {
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

    public function getArmor(){
        return $this->defence;
    }
}
?>
