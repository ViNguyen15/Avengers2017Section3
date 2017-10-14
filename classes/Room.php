<?php 
/**
    Class Script
    Accesses:   classes/Item.php
                classes/Monster.php 
*/
include_once "interface/display.php";

class Room implements display{
	
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
    public function addItems($items){
        foreach ($items as $item){
            $this->items[] = $item;
        }
    }

    public function addMonster($monster){
        $this->monsters[] = $monster;
    }

    public function addConnection($portal,$coord_x,$coord_y,$img){
        $this->portals[] = array(
            "id" => $portal,
            "x" => $coord_x,
            "y" => $coord_y,
            "img" => $img
            );
    }

    public function display(){
        echo "<h3>$this->name</h3>";
        echo "$this->description<br><br>";
        
        echo "<center><room>";
        foreach ($this->items as $item){
            $x = $item->xcoord;
            $y = $item->ycoord;
            echo "
            <form class='object' style='left:${x}px;top:${y}px' action='function/get_item.php'>
                <button type='submit' name='item' value='$item->id,$item->amount,$item->dropid '>
                <img height=32px width=32px src='images/decoration/$item->img.png' />
                </button>
            </form>
            ";
        }
        
        foreach ($this->portals as $portal){
            echo "
            <form class='object' style='left:$portal[x]px;top:$portal[y]px' action='function/goto_room.php'>
                <button type='submit' name='room' value='$portal[id]'>
                    <img height=32px width=32px src='images/decoration/$portal[img].png' />
                </button>
            </form>
            ";
        }

        echo "</room></center>";
    }
    // define methods

}
?>