<inventory>
Inventory:<br>
<?php
/**
    Used in:    Index.php
    Accesses:   classes/item.php
*/

$_SESSION['player']->displayInventory();

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