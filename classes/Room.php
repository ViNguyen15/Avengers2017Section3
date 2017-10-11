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
    public $portals=array();

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

    public function addConnection($portal,$coord_x,$coord_y,$img){
        $this->portals[] = array(
            "id" => $portal,
            "x" => $coord_x,
            "y" => $coord_y,
            "img" => $img);
    }

    public function display(){
        echo "<h3>$this->name</h3>";
        echo "$this->description<br><br>";

        echo "Items:";
        foreach ($this->items as $item){
            echo "
            <form action='function/get_item.php'>
                <button type='submit' name='item' value='$item->id,$item->amount,$item->dropid'>Item</button>
            </form>
            ";
        }

        echo "<br><br>Connections:";
        foreach ($this->portals as $index => $portal){
            echo "
            <form action='function/goto_room.php'>
                <button type='submit' name='room' value='$portal[id]'>
                    <img height=32px width=32px src='images/decoration/$portal[img].png' />
                </button>
            </form>
            ";
        }
    }
    // define methods

}
?>