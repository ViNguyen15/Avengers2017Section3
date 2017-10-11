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
class Weapon extends Item {
    public $power;
    public $level;
    public $upgradeValue;
}
?>
