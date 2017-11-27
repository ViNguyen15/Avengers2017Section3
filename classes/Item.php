<?php
/**
    ~~~~~~~~~~~~~~~ Item Class ~~~~~~~~~~~~~~~
    
    Description:
    *This class is used for all of the types of items.

    Helpful Information:
    *Items can be placed in the items array of a room.
    *Items can be placed in the drops array of a monster.
    *Items can be placed in the rewards array of a puzzle.
    *List of all ingame items is in the /database/items.php file

*/
class Item{
   
    // ~~~~~~~~~~~~~~~ Properties ~~~~~~~~~~~~~~~ 
    public $id;
    public $name;
    public $description;
    public $type;
    public $amount;
    public $sellValue;
    public $buyValue;

    // ~~~~~~~~~~~~~~~ Constructor ~~~~~~~~~~~~~~~ 
    public function __construct() {

    }


    // ~~~~~~~~~~~~~~~ Create Item Method ~~~~~~~~~~~~~~~
    public static function createItem( $id, $name, $description, $type, $buyValue, $sellValue ) {
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
    
    // ~~~~~~~~~~~~~~~ Methods ~~~~~~~~~~~~~~~
    public function changeAmt($value){
        $this->amount += $value;
        //Logic for increasing (or decreasing) the amount of an item.
    }

}


/**

    ~~~~~~~~~~~~~~~ MapItem Class ~~~~~~~~~~~~~~~
    
    Description:
    *This type of item is for being displayed on the map.

    Helpful Information:
    *The $dropid is a UNIQUE id used to track the item so that the item can be deleted after the player grabs it.
    *This type of item is added to the rooms array of a room.
    *This type of item should only be used in the /database/rooms.php file.

*/
/*
class MapItem extends Item implements display{

    // ~~~~~~~~~~~~~~~ Properties ~~~~~~~~~~~~~~~
    public $dropid;
    public $xcoord;
    public $ycoord;
    public $img;

    // ~~~~~~~~~~~~~~~ Create Item Method ~~~~~~~~~~~~~~~
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

    //~~~~~~~~~~~~~~~ Display Interface ~~~~~~~~~~~~~~~
    public function display(){
            $x = $this->xcoord*32;
            $y = $this->ycoord*32;
            echo "
            <form class='object' style='left:${x}px;top:${y}px' action='function/get_item.php'>
                <button type='submit' name='item' value='$this->dropid'>
                <img height=32px width=32px src='images/decoration/$this->img.png' />
                </button>
            </form>
            ";
    }
}
*/
/**
    ~~~~~~~~~~~~~~~ Weapon class ~~~~~~~~~~~~~~~
    Used in: database/item.php
 */

class Weapon extends Item {

    public $power; // int damage of weapon
    public $level; // int upgrade level. starts at 0, +1 for each upgrade
    public $accuracy; // int amount that weapon increases by for every upgrade
    public $upgradeCost;

    public static function createWeapon( $id, $name, $description, $type, $buyValue, $sellValue, $power, $accuracy) {
        $instance = new self();
        $instance->id=$id;
        $instance->name=$name;
        $instance->description=$description;
        $instance->type=$type;
        $instance->amount=0;
        $instance->buyValue=$buyValue;
        $instance->sellValue=$sellValue;
        $instance->power = $power;
        $instance->accuracy = $accuracy;
        $instance->level=0;
        $instance->upgradeCost = 1;
        return $instance;
    }

    public function upgradeWeapon(){
        $this->power += $accuracy;
        $this->level += 1;
        $this->upgradeCost += 1;
        // need logic somewhere for reduce minerals in player inventory
    }

}

class Armor extends Item{

    public $defence; // int defensive points of armor

    public static function createArmor( $id, $name, $description, $type, $buyValue, $sellValue, $defence) {
        $instance = new self();
        $instance->id=$id;
        $instance->name=$name;
        $instance->description=$description;
        $instance->type=$type;
        $instance->amount=0;
        $instance->buyValue=$buyValue;
        $instance->sellValue=$sellValue;
        $instance->defence=$defence;
        return $instance;
    }
}
?>
