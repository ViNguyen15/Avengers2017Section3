<?php 
class Room{
    // define properties
    public $id;
    public $name;
    public $items;
    public $monsters;

    // constructor
    public function __construct() {
        //$this->name = "hi";
    }

    // define methods

    public function createRoom($id, $name) {
        $this->id=$id;
        $this->name=$name;
    }
    public function addItem($item) {
        $this->items[]=$item;
    }
}
?>