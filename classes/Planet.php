<?php 
class Planet{
    // define properties
    public $id;
    public $name;
    public $rooms=array();

    // constructor
    public function __construct($id, $name) {
        $this->id=$id;
        $this->name=$name;
    }
    
    public function addRoom($room){
        $this->rooms[] = $room;
    }
}

?>