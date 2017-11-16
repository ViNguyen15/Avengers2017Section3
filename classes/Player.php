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
    public $x;
    public $y;
    public $game;
    public $healthMax;
    public $healthPoints;
    public $strength;
    public $equippedWeapon; // Weapon 
    public $equippedArmor; // Armor

    public function __construct() {
        $this->healthMax = 100;
        $this->healthPoints = 100;
    }

    //Movement code
    public function move_y($val) {
        if ($this->location->id != 50) {
            $this->y -= $val;
            $this->y = max(1, min($this->y, 14));
            $this->interact();
        }
    }

    public function move_x($val) {
        if ($this->location->id != 50) {
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
                break;
            }
        }
    }

    public function takeDamage($amount) {
        if ($this->healthPoints - $amount <= 0) {
            $this->healthPoints = 0;
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
        //$this->equippedWeapon = // get weapon from database or inventory
    }

    public function unequipWeapon() {
        // should still be in inventory
        $this->equippedWeapon = NULL;
    }

    public function equipArmor($id) {
        $this->unequipArmor();
        //$this->equippedArmor = // get armor from database or inventory;
    }

    public function unequipArmor() {
        // stays in inventory
        $this->equippedArmor = NULL;
    }

    public function displayPlayerInfo() {
        $this->displayStats();
        $this->displayInventory();
    }

    public function displayStats() {
        echo "<stats>
			  Health Points:$this->healthPoints/$this->healthMax<br>
			  Equipment:<br>
			  </stats>
			  ";
    }

    public function displayInventory() {

        echo "<inventory>Inventory:<br>";

        foreach ($this->inventory as $item) {
            $command = "";
            if ($item->type == "health") {
                $command = "Controller(\"useItem\",$item->id)";
            }
            if ($item->amount > 0 || $item->id == 0) {
                //Remove any items that are at 0 value
                echo "<item onclick='$command' onmouseover='displayDescription(this)' onmouseout='removeDescription(this)'> 
				<img src='./images/items/$item->id.png' height='32' width='32'>
				<description><b><u>$item->name</u></b> <br> $item->description</description>
				<amount>x$item->amount</amount>
				</item>";
            }
        }

        echo "<description id=\"desc\"></description> </inventory>";
    }

    public function displayRoom() {
        $loc = $this->location;
        $loc->display();
    }

}

?>
