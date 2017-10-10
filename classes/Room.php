<?php 
/**
rooms.php
display_room.php
*/
class Room{

	//Software Dev Team Avengers 
	
    // define properties
    public $id;
    public $name;
    public $description;
    public $items=array();
    public $monsters=array();

    // constructor
    public function __construct($id, $name, $description) {
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
    }

    // define methods

}
?>