<?php 
class Item{
    // define properties
    public $id;
    public $name;
    public $description;
    public $value;
    public $type;
    public $stackable;
    public $amount;

    public function __construct($id, $name, $description, $value, $type, $stackable) {
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->value=$value;
        $this->type=$type;
        $this->stackable=$stackable;
        $this->amount = 0;
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