<?php 
class Room{

	//Software Dev Team Avengers 
	
    // define properties
    public $id;
    public $name;
    public $items=array();
    public $monsters=array();

    // constructor
    public function __construct($id, $name) {
        $this->id=$id;
        $this->name=$name;
    }

    // define methods

}
?>