<inventory>
Inventory:<br>
<?php
/**
    Used in:    Index.php
    Accesses:   classes/item.php
*/

//Creates an array variable with all the inventory data from the session
$inventoryDisplay = $_SESSION['inventory'];

foreach ($inventoryDisplay as $index => $item){
//For each item in the inventory array
    if ($item->amount > 0 || $item->id==0){  
    //Remove any items that are at 0 value
    echo "<item onmouseover='displayDescription(this)' onmouseout='removeDescription(this)'> 
        <img src='./images/items/$item->id.png' height='32' width='32'>
        <description><b><u>$item->name</u></b> <br> $item->description</description>
        <amount>x$item->amount</amount>
        </item>";
    }
    
    }

?>
<description id="desc">

</description>
<script>
/*
 * This script makes a description appear and disappear when you hover over the image of the item. 
 */
var description = document.getElementById("desc").innerHTML;
function displayDescription(x) {
    document.getElementById("desc").innerHTML = x.getElementsByTagName("description")[0].innerHTML; 
}

function removeDescription(x) {
    document.getElementById("desc").innerHTML = " "; 
}
</script>

</inventory>