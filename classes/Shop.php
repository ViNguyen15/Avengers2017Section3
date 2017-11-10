<?php 
/**
    Shop Class
    
    Description:
    *This class used to create shops

    Helpful Information:
    *Shops are placed into
*/
class Shop implements display {


    // ~~~~~~~~~~~~~~~ Properties ~~~~~~~~~~~~~~~
    public $id;
    public $name;
    public $description;

    // ~~~~~~~~~~~~~~~ Constructor ~~~~~~~~~~~~~~~
    // To create a new room you must identify these three variables.
    public function __construct($id, $name, $description) {
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
    }


    public function display(){      
        echo "<shop style='background-image:url(\"images/rooms/$this->id.png\")'>";
        

        echo "<button onclick='Controller(\"buyItem\",1)'>Buy <img src='images/items/1.png' /> for 25 coins</button><br>";
        echo "<button onclick='Controller(\"buyItem\",2)'>Buy <img src='images/items/2.png' /> for 50 coins</button><br>";


        echo "<br><button onclick='Controller(\"enterDoor\",9)'> Leave Shop </button>";


        echo "</shop>";
        
        echo "<h3>$this->name</h3>";
        echo "$this->description<br><br>";
    }

}

?>