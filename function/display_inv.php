<?php
session_start();

$inventory = $_SESSION['inventory'];

echo "Inventory:<br>";
foreach ($inventory as $item){
    if ($item->amount >= 0){
        echo "<div class='item'> <img src='./images/$item->name.png' height='32' width='32'> $item->name x $item->amount  </div>";
    }
}

?>