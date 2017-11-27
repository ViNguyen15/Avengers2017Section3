<?php 
/**
    Shop Class
    
    Description:
    *This class used to create shops

    Helpful Information:
    *Shops are placed into
*/
class Shop {


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


    public function display($inventory){      
        echo "<shop style='background-image:url(\"images/rooms/$this->id.png\")'>";
        echo "<sell>Sell<br>";
            foreach ($inventory as $item){
                if ($item->type != "parts" && $item->amount > 0 && $item->id != 0){
                    echo "<shopitem onclick='Controller(\"sellItem\",$item->id)'><img src='images/items/$item->id.png' /><price>$item->sellValue coins</price></shopitem>";
                }
            }
        echo "</sell>";

        echo "<buy>Buy<br>";
            echo "<shopitem onclick='Controller(\"buyItem\",1)'><img src='images/items/1.png' /><price>50 coins</price></shopitem>";
            echo "<shopitem onclick='Controller(\"buyItem\",2)'><img src='images/items/2.png' /><price>100 coins</price></shopitem>";
            echo "<shopitem onclick='Controller(\"buyItem\",3)'><img src='images/items/3.png' /><price>500 coins</price></shopitem>";
            echo "<shopitem onclick='Controller(\"buyItem\",4)'><img src='images/items/4.png' /><price>1000 coins</price></shopitem>";
            echo "<shopitem onclick='Controller(\"buyItem\",5)'><img src='images/items/5.png' /><price>50 coins</price></shopitem>";
            echo "<shopitem onclick='Controller(\"buyItem\",6)'><img src='images/items/6.png' /><price>400 coins</price></shopitem>";
            echo "<shopitem onclick='Controller(\"buyItem\",7)'><img src='images/items/7.png' /><price>700 coins</price></shopitem>";
            echo "<shopitem onclick='Controller(\"buyItem\",8)'><img src='images/items/8.png' /><price>1200 coins</price></shopitem>";
            echo "<shopitem onclick='Controller(\"buyItem\",9)'><img src='images/items/9.png' /><price>2200 coins</price></shopitem>";
            echo "<shopitem onclick='Controller(\"buyItem\",10)'><img src='images/items/10.png' /><price>100 coins</price></shopitem>";
            echo "<shopitem onclick='Controller(\"buyItem\",11)'><img src='images/items/11.png' /><price>1400 coins</price></shopitem>";
            echo "<shopitem onclick='Controller(\"buyItem\",12)'><img src='images/items/12.png' /><price>2200 coins</price></shopitem>";
        echo "</buy>";
        

        echo "<br><button onclick='Controller(\"enterDoor\",12)'> Leave Shop </button>";


        echo "</shop>";
        
        echo "<h3>$this->name</h3>";
        echo "$this->description<br>";
    }

}

?>