<?php

/**
  ~~~~~~~~~~~~~~~ Player Class ~~~~~~~~~~~~~~~

  Description:
 * This class holds all of the information that will be saved and used by the player.

  Helpful Information:

 */
class Player {

    public $name;
    public $password;     //This is hashed so no passwords can be leaked.
    public $inventory = array();
    public $location;
    public $prev_location;
    public $x;
    public $y;
    public $game;
    public $healthMax;
    public $healthPoints;
    public $strength = 2;
    public $accuracy = 50;
    public $defense = 1;
    public $equippedWeapon; // Weapon 
    public $equippedArmor; // Armor
    public $roomsvisited = array();
    public $puzzles = array();

    public function __construct() {
        $this->healthMax = 100;
        $this->healthPoints = 100;
    }

    //Movement code
    public function move_y($val) {
        if ($this->location->id < 50) {
            $this->y -= $val;
            $this->y = max(1, min($this->y, 14));
            $this->interact();
        }
    }

    public function move_x($val) {
        if ($this->location->id < 50) {
            $this->x += $val;
            $this->x = max(0, min($this->x, 14));
            $this->interact();
        }
    }

    //End movement code
    public function interact() {
        foreach ($this->location->entities as $index => $entity) {
            if ($entity->x == $this->x && $entity->y == $this->y) {
                switch ($entity->type) {
                    case "item":
                        $this->getItem($index);
                        break;
                    case "door":
                        $this->enterDoor($entity->id);
                        break;
                    case "monster":
                        $this->startFight($entity->id);
                        break;
                    case "puzzle":
                        $this->startPuzzle($entity->id);
                        break;
                }
            }
        }
    }

    public function addItemToInventory($addedItem) {
        foreach ($this->inventory as $item) {
            if ($addedItem->id == $item->id) {
                $item->amount += $addedItem->amount;
                break;
            }
        }
    }

    public function sellItem($id){
        $price = $this->inventory[$id]->sellValue;
        if ($this->inventory[$id]->amount > 0) {
            $this->inventory[0]->amount += $price;
            $this->inventory[$id]->amount -= 1;
        }
    }
    
    public function buyItem($id) {
        $price = $this->inventory[$id]->buyValue;
        if ($this->inventory[0]->amount >= $price) {
            $this->inventory[0]->amount -= $price;
            $this->inventory[$id]->amount += 1;
        }
    }

    public function getItem($id) {
        $loc = $this->location;
        $this->addItemToInventory($loc->entities[$id]);

        unset($loc->entities[$id]);
        //removes from map
    }

    public function useItem($id) {
        // healing item cannot be used unless player is hurt
        if ($id == 1 and $this->healthPoints < $this->healthMax) { //medicine
            $this->heal($this->healthMax / 2);
        } else if ($id == 2 and $this->healthPoints < $this->healthMax) { //elixer
            $this->heal($this->healthMax);
        } else {
            return;
        }

        $count = 0;
        while (true) {
            if ($id == $this->inventory[$count]->id) {
                $this->inventory[$count]->amount--;
                break;
            }
            $count++;
        }
    }


    public function enterDoor($roomid) {
        foreach ($this->game as $room) {
            if ($room->id == $roomid) {
                $this->location = $room;
                
                if (!in_array($roomid, $roomsvisited)){
                    $this->roomsvisited[] = $room;
                }
                break;
            }
        }
    }

    public function startFight($monsterid){
        $this->prev_location = $this->location;
        $this->location = end($this->game);
        $this->location->setMonster("$monsterid");
    }

    public function attack(){
        $this->takeDamage($this->location->attack($this->strength, $this->accuracy, $this->defense));
        if ($this->location->check() == 1){
            foreach ($this->prev_location->entities as $index=>$entity){
                if ($entity->type == "monster"){
                    $this->rewardItem($entity->itemid,$entity->amt);
                    unset($this->prev_location->entities[$index]);
                    $this->location = $this->prev_location;
                }
            }
        }
    }
    public function startPuzzle($puzzleid){
        $this->prev_location = $this->location;
        foreach ($this->game as $room) {
            if ($room->id == $puzzleid) {
                $this->location = $room;
                
                if (!in_array($puzzleid, $roomsvisited)){
                    $this->roomsvisited[] = $room;
                }
                break;
            }
        }
    }
    public function tryAnswer($answer){
        $puzzle = $this->location;
        if (strtolower($puzzle->answer) == strtolower($answer)){
            $puzzle->completed = 1;
            $this->rewardItem($puzzle->rewardId,$puzzle->rewardAmount);
            $this->location = $this->prev_location;

        }
    }
    public function rewardItem($itemid,$amount){
        foreach ($this->inventory as $item) {
            if ($itemid == $item->id) {
                $item->amount += $amount;
                break;
            }
        }
    }
    public function goBack($x){
        $this->location = $this->prev_location;
    }

    public function takeDamage($amount) {
        if ($this->healthPoints - $amount <= 0) {
            $this->healthPoints = 0;
            $this->location = $this->game[9];
            $this->x = 1;
            $this->y = 1;
            $this->healthPoints = 50;
            // We need to do something when the player dies
        } else {
            $this->healthPoints -= $amount;
        }
    }

    public function heal($amount) {
        $this->healthPoints += $amount;
        $this->healthPoints = min($this->healthPoints, $this->healthMax);
    }

    public function equipWeapon($id) {
        $this->unequipWeapon();
        foreach($this->inventory as $item){
            if ($item->id == $id){
                $this->equippedWeapon = $item;
                $this->strength += $item->power;
                $this->accuracy = $item->accuracy;
            }
        }
            // get weapon from database or inventory
    }

    public function unequipWeapon() {
        // should still be in inventory
        $this->strength = 2;
        $this->accuracy = 50;
        $this->equippedWeapon = NULL;
    }

    public function equipArmor($id) {
        $this->unequipArmor();
        foreach($this->inventory as $item){
            if ($item->id == $id){
                $this->equippedArmor = $item;
                $this->defense += $item->defence;
            }
        }
        //$this->equippedArmor = // get armor from database or inventory;
    }

    public function unequipArmor() {
        $this->defense = 1;
        // stays in inventory
        $this->equippedArmor = NULL;
    }

    public function displayParts() {
        echo "Ship Parts<br>";
        $count = 0;
        foreach ($this->inventory as $item){
            if ($item->type == "part"){
                $color = "red";
                if ($item->amount > 0) {
                    $color = "green";
                    $count ++;
                }
                echo "<item style='background-color:$color'> 
				<img src='./images/items/$item->id.png'>
				<alt><b><u>$item->name</u></b> <br> You're still missing this part.</alt>
				</item>";
            }
            
        }
        echo "<br style='clear:both'>";
        if ($count == 6) {
            $this->location = $this->game[0];
        }
    }

    public function displayPlayerInfo() {
        $this->displayStats();
        $this->displayInventory();
    }

    public function displayStats() {
        echo "
			  Health Points:$this->healthPoints/$this->healthMax<br>
			  Strength:$this->strength<br>
              Accuracy:$this->accuracy%<br>
              Defense:$this->defense<br>
			  ";
    }

    public function displayInventory() {

        echo "Inventory:<br>";

        foreach ($this->inventory as $item) {
            $command = "";
            if ($item->type == "health") {
                $command = "Controller(\"useItem\",$item->id)";
            } elseif ($item->type == "armor")  {
                $command = "Controller(\"equipArmor\",$item->id)";
            } elseif ($item->type == "weapon")  {
                $command = "Controller(\"equipWeapon\",$item->id)";
            } elseif ($item->type == "part")  {
                $command = "Controller(\"addPart\",$item->id)";
            }
            if ($item->amount > 0 || $item->id == 0) {
                //Remove any items that are at 0 value
                echo "<item onclick='$command' onmouseover='displayDescription(this)' onmouseout='removeDescription(this)'> 
				<img src='./images/items/$item->id.png'>
				<alt><b><u>$item->name</u></b> <br> $item->description</alt>
				<amount>x$item->amount</amount>
				</item>";
            }
        }

        echo "<description id=\"desc\"></description>";
    }

    public function displayEquipped(){
        $armor = $this->equippedArmor;
        $weapon = $this->equippedWeapon;
        if (($armor!=NULL)||($weapon!=NULL)){
            echo "Equipped:<br>";
        }
        if ($armor!=NULL){
            echo "<item onclick='Controller(\"unequipArmor\",$armor->id)' onmouseover='displayDescription(this)' onmouseout='removeDescription(this)'> 
				<img src='./images/items/$armor->id.png'>
				<alt><b><u>$armor->name</u></b> <br> $armor->description</alt>
				</item>";
        }
        if ($weapon!=NULL){
            echo "<item onclick='Controller(\"unequipWeapon\",$weapon->id)' onmouseover='displayDescription(this)' onmouseout='removeDescription(this)'> 
				<img src='./images/items/$weapon->id.png'>
				<alt><b><u>$weapon->name</u></b> <br> $weapon->description</alt>
				</item>";
        }
        if (($armor!=NULL)||($weapon!=NULL)){
            echo "<br><br><br>";
        }
    }

    public function displayRoom() {
        $loc = $this->location;
        if ($loc->name=="Shop"){
            $loc->display($this->inventory);
        } else {
            $loc->display($this->roomsvisited);
        }
        
    }

}

?>
