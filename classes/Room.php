<?php 
/**
    Class Script
    Accesses:   classes/Item.php
                classes/Monster.php 
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

    public function addItem($item){
        $this->items[] = $item;
    }

    public function addMonster($monster){
        $this->monsters[] = $monster;
    }

    public function display(){
        echo "<h3>$this->name</h3>";
        echo "$this->description";

        foreach ($this->items as $item){
            echo "
            <form action='function/get_item.php'>
                <button type='submit' name='item' value='$item->id,$item->amount,$item->dropid'>Item</button>
            </form>
            ";
        }

        echo "
            <form action='function/goto_planet.php'>
            <button type='submit' name='room' value='$this->id'>Back to Planet</button>
            </form>
            ";
    }
    // define methods

}
?>