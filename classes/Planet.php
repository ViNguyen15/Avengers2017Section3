<?php 

include_once "interface/display.php";
class Planet implements display{
    // define properties
    public $id;
    public $name;
    public $rooms=array();

    // constructor
    public function __construct($id, $name) {
        $this->id=$id;
        $this->name=$name;
    }
    
    public function setRooms($rooms){
         $this->rooms = $rooms;
    }
    public function display(){
        echo "<h3>$this->name</h3>";

        foreach ($this->rooms as $room){
            echo "
            <form action='function/goto_room.php'>
            <button type='submit' name='room' value='$room->id'>$room->name</button>
            </form>
            ";
        }

        echo "
            <form action='function/goto_system.php'>
            <button type='submit'>Back to System</button>
            </form>
            ";
    }
}

?>