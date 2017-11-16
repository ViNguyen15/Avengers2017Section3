<?php
/**
    ~~~~~~~~~~~~~~~ MapEntity Class ~~~~~~~~~~~~~~~
    
    Description:
    *This class is used for storing all the various things shown on the map

    Helpful Information:
    *

*/
class MapEntity {
   
    // ~~~~~~~~~~~~~~~ Properties ~~~~~~~~~~~~~~~ 
    public $x;
    public $y;
    public $id;
    public $image;
    public $type;


    // ~~~~~~~~~~~~~~~ Constructor ~~~~~~~~~~~~~~~ 
    public function __construct() {

    }

}



class MapItem extends MapEntity {

    // ~~~~~~~~~~~~~~~ Properties ~~~~~~~~~~~~~~~

    public $amount;

    // ~~~~~~~~~~~~~~~ Create Item Method ~~~~~~~~~~~~~~~
    public static function create( $itemid , $amount , $coordinate , $image ) {
        $instance = new self();
        $instance->id = $itemid;
        $instance->amount = $amount;
        $coords = explode(",", $coordinate);
        $instance->x = $coords[0];
        $instance->y = $coords[1];
        $instance->image = $image;
        $instance->type = "item";
        return $instance;
    }

    //~~~~~~~~~~~~~~~ Display Interface ~~~~~~~~~~~~~~~
    public function display($index){
        $x = $this->x*32;
        $y = $this->y*32;
        echo "
        <item style='left:${x}px;top:${y}px' onclick='Controller(\"getItem\",$index)'>
            <img height=32px width=32px src='images/decoration/$this->image.png' />
        </item>
        ";
    }
}

class MapDoor extends MapEntity {

    // ~~~~~~~~~~~~~~~ Properties ~~~~~~~~~~~~~~~

    // ~~~~~~~~~~~~~~~ Create Item Method ~~~~~~~~~~~~~~~
    public static function create( $roomid , $coordinate , $image ) {
        $instance = new self();
        $instance->id = $roomid;
        $coords = explode(",", $coordinate);
        $instance->x = $coords[0];
        $instance->y = $coords[1];
        $instance->image = $image;
        $instance->type = "door";
        return $instance;
    }

    //~~~~~~~~~~~~~~~ Display Interface ~~~~~~~~~~~~~~~
    public function display($roomsvisited){
        $default = 32;
        $x = $this->x*32;
        $y = $this->y*32;
        $planet = "";
        $tempimage = $this->image;
        if ($this->image == "portal_planet"){
            $x -= 12;
            $y -= 12;
            $default = 56;
            //$planet = "portalplanet";
            $tempimage = "portal";
        }
        $name = "";
        foreach ($roomsvisited as $room){
            if ($room->id == $this->id){
                $name = $room->name;
            }
        }
        echo "
        <door style='left:${x}px;top:${y}px' onclick='Controller(\"enterDoor\",$this->id)'>
            <img class='$planet' height=${default} width=${default} src='images/decoration/$tempimage.png' />
            <description>$name</description>
        </door>
        ";
    }
}

class MapMonster extends MapEntity {
    // ~~~~~~~~~~~~~~~ Properties ~~~~~~~~~~~~~~~

    // ~~~~~~~~~~~~~~~ Create Item Method ~~~~~~~~~~~~~~~
    public static function create( $roomid , $coordinate , $image ) {
        $instance = new self();
        $instance->id = $roomid;
        $coords = explode(",", $coordinate);
        $instance->x = $coords[0];
        $instance->y = $coords[1];
        $instance->image = $image;
        $instance->type = "monster";
        return $instance;
    }
    public function display($index){
        $x = $this->x*32;
        $y = $this->y*32;
        echo "
        <monster style='left:${x}px;top:${y}px' onclick='Controller(\"startFight\",$this->id)'>
            <img height=32px width=32px src='images/monsters/$this->id.png' />
        </monster>
        ";
    }
}


?>
