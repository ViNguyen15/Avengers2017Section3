<?php 
/**
    Room Class
    
    Description:
    *This class is used to hold room information. 

    Helpful Information:
    *Rooms are placed in planet classes into the rooms array of a planet.
    *List of rooms (And things inside the room) should be in the /database/rooms.php file

*/

class Room{
	
    // ~~~~~~~~~~~~~~~ Properties ~~~~~~~~~~~~~~~
    public $id;
    public $name;
    public $description;
    public $entities=array();

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
            $this->entities[] = $entity;
        }
    }
    public function addEntity($entity){
        $this->entities[] = $entity;
    }

    //~~~~~~~~~~~~~~~ Display Interface ~~~~~~~~~~~~~~~
    // Displays the room to the page. 
    public function display($roomsvisited){
        
        echo "<room style='background-image:url(\"images/rooms/$this->id.png\")'>";
        $this->displayMapEntities($roomsvisited);
        echo "</room>";
        
        echo "<h3>$this->name</h3>";
        echo "$this->description<br><br>";
        
    }

    // ~~~~~~~ Display Helper Methods ~~~~~~~
    // Below methods contain seperated display functions so each type of
    // object can be changed seperately if needed.
    
    function displayMapEntities($roomsvisited){
        foreach ($this->entities as $index => $entity){
            if ($entity->type == "door")
            {
                $entity->display($roomsvisited);
            }
            else {
                $entity->display($index);
            }
            
        }
    }

}
?>