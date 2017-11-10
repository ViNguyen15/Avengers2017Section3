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
        

        echo "<button onclick='Controller(\"buyItem\",1)'>Buy <img src='images/items/1.png' /> for 50 coins</button><br>";
        echo "<button onclick='Controller(\"buyItem\",2)'>Buy <img src='images/items/2.png' /> for 100 coins</button><br>";
        echo "<button onclick='Controller(\"buyItem\",3)'>Buy <img src='images/items/3.png' /> for 500 coins</button><br>";
        echo "<button onclick='Controller(\"buyItem\",4)'>Buy <img src='images/items/4.png' /> for 1000 coins</button><br>";
        echo "<button onclick='Controller(\"buyItem\",5)'>Buy <img src='images/items/5.png' /> for 50 coins</button><br>";
        echo "<button onclick='Controller(\"buyItem\",6)'>Buy <img src='images/items/6.png' /> for 400 coins</button><br>";
        echo "<button onclick='Controller(\"buyItem\",7)'>Buy <img src='images/items/7.png' /> for 700 coins</button><br>";
        echo "<button onclick='Controller(\"buyItem\",8)'>Buy <img src='images/items/8.png' /> for 1200 coins</button><br>";
        echo "<button onclick='Controller(\"buyItem\",9)'>Buy <img src='images/items/9.png' /> for 2200 coins</button><br>";
        echo "<button onclick='Controller(\"buyItem\",10)'>Buy <img src='images/items/10.png' /> for 100 coins</button><br>";
        echo "<button onclick='Controller(\"buyItem\",11)'>Buy <img src='images/items/11.png' /> for 1400 coins</button><br>";
        echo "<button onclick='Controller(\"buyItem\",12)'>Buy <img src='images/items/12.png' /> for 2200 coins</button><br>";
        echo "<br><button onclick='Controller(\"enterDoor\",9)'> Leave Shop </button>";


        echo "</shop>";
        
        echo "<h3>$this->name</h3>";
        echo "$this->description<br><br>";
    }

}

?>