<?php 
/**
    Room Class
    
    Description:
    *This class is used to hold room information. 

    Helpful Information:
    *Rooms are placed in planet classes into the rooms array of a planet.
    *List of rooms (And things inside the room) should be in the /database/rooms.php file

*/

class Room implements display{
	
    // ~~~~~~~~~~~~~~~ Properties ~~~~~~~~~~~~~~~
    public $id;
    public $name;
    public $description;
    public $imagesrc;
    public $items=array();
    public $monsters=array();
    public $connections=array();
    public $map_entities=array();

    // ~~~~~~~~~~~~~~~ Constructor ~~~~~~~~~~~~~~~
    // To create a new room you must identify these three variables.
    public function __construct($id, $name, $description) {
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
    }

    // ~~~~~~~~~~~~~~~ Methods ~~~~~~~~~~~~~~~

    // ~~~~~~~ Adder Methods ~~~~~~~

    public function addEntities($entities){
        foreach ($entities as $entity){
            $this->map_entities[] = $entity;
        }
    }

    // The methods below add objects into their respective arrays.
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

    public function addConnection($connection,$coordinate,$img){
        $coords = explode(",", $coordinate);
        $coord_x = $coords[0];
        $coord_y = $coords[1];
        $this->connections[] = array(
            "id" => $connection,
            "x" => $coord_x,
            "y" => $coord_y,
            "img" => $img
            );
    }
    //~~~~~~~~~~~~~~~ Display Interface ~~~~~~~~~~~~~~~
    // Displays the room to the page. 
    public function display(){
        
        echo "<room style='background-image:url(\"images/rooms/$this->id.png\")'>";
        $this->displayItems();
        $this->displayConnections();

        $this->displayMapEntities();
        echo "</room>";
        
        echo "<h3>$this->name</h3>";
        echo "$this->description<br><br>";
        
    }

    // ~~~~~~~ Display Helper Methods ~~~~~~~
    // Below methods contain seperated display functions so each type of
    // object can be changed seperately if needed.
    function displayItems(){
        foreach ($this->items as $index => $item){
            $item->display($index);
        }
    }
    function displayMonster(){
        foreach ($this->monsters as $monster){
            $monster->display();
        }
    }

    function displayConnections(){
        foreach ($this->connections as $connection){
            $x = ($connection['x'])*32;
            $y = ($connection['y'])*32;
            echo "
            <form class='object' style='left:${x}px;top:${y}px' action='function/goto_room.php'>
                <button type='submit' name='room' value='$connection[id]'>
                    <img src='images/decoration/$connection[img].png' />
                </button>
            </form>
            ";
        }
    }
    
    function displayMapEntities(){
        foreach ($this->map_entities as $index => $entity){
            $entity->display($index);
        }
    }

}
?>