<?php

$inventory = $_SESSION['inventory'];
//Creates an array variable with all the inventory data from the session


echo "Inventory:<br>";

foreach ($inventory as $item){
//For each item in the inventory array
    //if ($item->amount > 0){ 
    //Remove the comments before if-statement to only show items the player has
        echo "<div class='item'> <img src='./images/items/$item->id.png' height='32' width='32'> $item->name x $item->amount  </div>";
    //}
}

?>