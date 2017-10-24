<?php
/**
    ~~~~~~~~~~~~~~~ MapEntity Class ~~~~~~~~~~~~~~~
    
    Description:
    *This class is used for storing all the various things shown on the map

    Helpful Information:
    *

*/
class MapEntity{
   
    // ~~~~~~~~~~~~~~~ Properties ~~~~~~~~~~~~~~~ 
    public $x;
    public $y;
    public $id;
    public $image;


    // ~~~~~~~~~~~~~~~ Constructor ~~~~~~~~~~~~~~~ 
    public function __construct() {

    }

}



class MapItem extends MapEntity{

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
        return $instance;
    }

    //~~~~~~~~~~~~~~~ Display Interface ~~~~~~~~~~~~~~~
    public function display($index){
        $x = $this->x*32;
        $y = $this->y*32;
        echo "
        <item id='$index' style='left:${x}px;top:${y}px' onclick='getItem()'>
            <img height=32px width=32px src='images/decoration/$this->image.png' />
        </item>
        ";
    }
}

class MapDoor extends MapEntity{

    // ~~~~~~~~~~~~~~~ Properties ~~~~~~~~~~~~~~~

    // ~~~~~~~~~~~~~~~ Create Item Method ~~~~~~~~~~~~~~~
    public static function create( $roomid , $coordinate , $image ) {
        $instance = new self();
        $instance->id = $roomid;
        $coords = explode(",", $coordinate);
        $instance->x = $coords[0];
        $instance->y = $coords[1];
        $instance->image = $image;
        return $instance;
    }

    //~~~~~~~~~~~~~~~ Display Interface ~~~~~~~~~~~~~~~
    public function display($index){
        $x = $this->x*32;
        $y = $this->y*32;
        echo "
        <door id='$index' style='left:${x}px;top:${y}px' onclick='enterDoor()'>
            <img height=32px width=32px src='images/decoration/$this->image.png' />
        </door>
        ";
    }
}


?>
