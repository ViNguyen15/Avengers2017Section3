<?php
class Item{
    // define properties
    public $id;
    public $name;
    public $description;
    public $sellValue;
    public $buyValue;
    public $type;
    public $stackable;
    public $amount;
    // Jarrod is awesome
    public function __construct($id, $name, $description, $sellValue, $type, $stackable, $buyValue) {
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->sellValue=$sellValue;
        $this->type=$type;
        $this->stackable=$stackable;
        $this->amount = 0;
		    $this->buyValue = $buyValue;
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
?>
