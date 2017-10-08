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
    public function __construct($id, $name, $description, $type, $stackable, $buyValue, $sellValue) {
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->type=$type;
        $this->stackable=$stackable;
        $this->amount=0;
		$this->buyValue=$buyValue;
        $this->sellValue=$sellValue;
    }
    public $dropid;
    public static function itemDrop( $id , $amount , $dropid ) {
        $instance = new self($id, "", "", "", 0, "","");
        $instance->id = $id;
        $instance->amount = $amount;
        $instance->dropid = $dropid;
        return $instance;
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
