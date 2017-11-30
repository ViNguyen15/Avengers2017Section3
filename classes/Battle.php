<?php 
/**
    Shop Class
    
    Description:
    *This class used to create shops

    Helpful Information:
    *Shops are placed into
*/
class Battle implements display{
    public $id;
    public $monsters;

    // ~~~~~~~~~~~~~~~ Properties ~~~~~~~~~~~~~~~
    public $monster;
    public $monsterhealth;

    // ~~~~~~~~~~~~~~~ Constructor ~~~~~~~~~~~~~~~
    // To create a new room you must identify these three variables.
    public function __construct($monsters) {
        $this->id = 100;
        $this->monsters = $monsters;
    }
    public function setMonster($id){
        $this->monster = $this->monsters[$id];
        $this->monsterhealth = $this->monster->healthPoints;
    }

    public function attack($power,$acc,$def){
        $roll = rand(0,100);
        if ($roll <= $acc){
            $this->monsterhealth -= $power;
        }

        $dmg = $this->monster->strength;
        $roll2 = rand(0,$def);
        $dmg -= $roll2;
        return $dmg;
    }
    public function check(){
        if ($this->monsterhealth <= 0){
            return 1;
        }
        return 0;
    }
    public function display(){
        echo "<battle style='background-image:url(\"images/rooms/battle.png\")'>";
        $m = $this->monster;
        $hp = ($this->monsterhealth / $m->healthPoints) * 100;
        echo "<enemy><img width='140px' height='140px' src='images/monsters/$m->id' /><br>
        <bar><hp style='width:$hp%'></hp><text>$this->monsterhealth / $m->healthPoints</text></bar>
        <center>$m->name</center></enemy>";

        echo "<player><img width=110px height=124px src='images/head.png' /></player>";
        // attack code
            // accuracy
            // power
        echo "<options>
        
        <submit onclick='Controller(\"attack\",1)'>Attack</submit>

        <submit onclick='Controller(\"goBack\",1)'>Run</submit>
        
        </options>";

		echo "</battle>";        
    }

}

?>