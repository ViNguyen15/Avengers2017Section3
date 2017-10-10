<?php
/**
index.php
 */
$game = $_SESSION['game'];
$location = $_SESSION['location'];
//Creates an array variable with all the inventory data from the session

$current_planet = findPlanet($game,$location);
$current_room = findRoom($game,$location);

echo '<h2>Planet '.$current_planet->name.'</h2>';
echo '<h3>'.$current_room->name.'</h3>';
echo '<p1>'.$current_room->description.'</>';

foreach ($current_room->items as $item){
    echo "
    <form action='function/get_item.php'>
        <button type='submit' name='item' value='$item->id,$item->amount,$item->dropid'>Item</button>
    </form>
    ";
}
echo "<br><br> Rooms on $current_planet->name:";
foreach ($game as $planet){ 
    foreach ($planet->rooms as $room){
        echo "
        <form action='function/goto_room.php'>
        <button type='submit' name='room' value='$room->id'>$room->name</button>
        </form>
        ";
    }
}


function findPlanet($planets,$id){
    foreach ($planets as $planet){ 
        foreach ($planet->rooms as $room){
            if ($room->id == $id){
                return $planet;
            }
        }
    }
}
function findRoom($planets,$id){
    foreach ($planets as $planet){ 
        foreach ($planet->rooms as $room){
            if ($room->id == $id){
                return $room;
            }
        }
    }
}

?>