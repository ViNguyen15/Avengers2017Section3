<?php 
class Planet{
    // define properties
    public $id;
    public $name;
    public $rooms=array();

    // constructor
    public function __construct() {
        //$this->age = 0;
    }

    // define methods
    public function createPlanet($id, $name) {
        $this->id=$id;
        $this->name=$name;
    }

    public function addRoom($room) {
        $this->rooms[] = $room;
    }
}
?>