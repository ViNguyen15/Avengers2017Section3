<?php

foreach (glob("../classes/*.php") as $class) {
    include("$class");
}
#  _____  _                  _       
# |  __ \| |                | |      
# | |__) | | __ _ _ __   ___| |_ ___ 
# |  ___/| |/ _` | '_ \ / _ \ __/ __|
# | |    | | (_| | | | |  __/ |_\__ \
# |_|    |_|\__,_|_| |_|\___|\__|___/


#  __  __                                
# |  \/  |                               
# | \  / | ___ _ __ ___ _   _ _ __ _   _ 
# | |\/| |/ _ \ '__/ __| | | | '__| | | |
# | |  | |  __/ | | (__| |_| | |  | |_| |
# |_|  |_|\___|_|  \___|\__,_|_|   \__, |
#                                   __/ |
#                                  |___/ 

$Mercury = new Planet(1,"Mercury");

$Me_R1 = new Room(1,"Outside Power Plant", "You stand outside of what appears to be a large white building that is gated off. While it is not clear what exactly it is used for, at first glance it appears to be a power plant of some sort.");
$Mercury->rooms[] = $Me_R1;

$Me_R1->items[] = Item::itemDrop(0,15,1001);
$Me_R1->items[] = Item::itemDrop(2,2,1002);

 $Me_R2 = new Room(2,"Generator Room", "The center of the power plant appears to be a power plant. While it is still able to function, there is very clearly visible damage to the inside of the room, and a few parts appear to be missing.");
 $Mercury->rooms[] = $Me_R2;

 $Me_R3 = new Room(3,"Destroyed Wing", "The west side of the plant is destroyed beyond repair. The back wall is non-existent, the only evidence that it even existed at any point is a pile of rubble surrounding the hole.");
 $Mercury->rooms[] = $Me_R3;
 $Me_R3->items[] = Item::itemDrop(0,50,1003);
 $Me_R3->items[] = Item::itemDrop(1,2,1004);

 $Me_R4 = new Room(4,"Manager's Room", "You enter what appears to be an office. A man sits behind a desk and stares at you, wondering what you are doing in here. While he does not seem dangerous, he is wary of your presence.");
 $Mercury->rooms[] = $Me_R4;



# __      __                  
# \ \    / /                  
#  \ \  / /__ _ __  _   _ ___ 
#   \ \/ / _ \ '_ \| | | / __|
#    \  /  __/ | | | |_| \__ \
#     \/ \___|_| |_|\__,_|___/

$Venus = new Planet(2,"Venus");

#  ______           _   _     
# |  ____|         | | | |    
# | |__   __ _ _ __| |_| |__  
# |  __| / _` | '__| __| '_ \ 
# | |___| (_| | |  | |_| | | |
# |______\__,_|_|   \__|_| |_|

$Earth = new Planet(3,"Earth");

#  __  __                
# |  \/  |               
# | \  / | __ _ _ __ ___ 
# | |\/| |/ _` | '__/ __|
# | |  | | (_| | |  \__ \
# |_|  |_|\__,_|_|  |___/

$Mars = new Planet(4,"Mars");

#         _             _ _            
#        | |           (_) |           
#        | |_   _ _ __  _| |_ ___ _ __ 
#    _   | | | | | '_ \| | __/ _ \ '__|
#   | |__| | |_| | |_) | | ||  __/ |   
#    \____/ \__,_| .__/|_|\__\___|_|   
#                | |                   
#                |_|                   

$Jupiter = new Planet(5,"Jupiter");

#     _____       _                    
#    / ____|     | |                   
#   | (___   __ _| |_ _   _ _ __ _ __  
#    \___ \ / _` | __| | | | '__| '_ \ 
#    ____) | (_| | |_| |_| | |  | | | |
#   |_____/ \__,_|\__|\__,_|_|  |_| |_|

$Saturn = new Planet(6,"Saturn");

#    _    _                           
#   | |  | |                          
#   | |  | |_ __ __ _ _ __  _   _ ___ 
#   | |  | | '__/ _` | '_ \| | | / __|
#   | |__| | | | (_| | | | | |_| \__ \
#    \____/|_|  \__,_|_| |_|\__,_|___/

$Uranus = new Planet(7,"Uranus");

#    _   _            _                    
#   | \ | |          | |                   
#   |  \| | ___ _ __ | |_ _   _ _ __   ___ 
#   | . ` |/ _ \ '_ \| __| | | | '_ \ / _ \
#   | |\  |  __/ |_) | |_| |_| | | | |  __/
#   |_| \_|\___| .__/ \__|\__,_|_| |_|\___|
#              | |                         
#              |_|                         

$Neptune = new Planet(8,"Neptune");

$planets = array();
$planets[] = $Mercury;
$planets[] = $Venus;
$planets[] = $Earth;
$planets[] = $Mars;
$planets[] = $Jupiter;
$planets[] = $Saturn;
$planets[] = $Uranus;
$planets[] = $Neptune;

/*
foreach ($planets as $planet) { 
    echo "Planet $planet->name <br>";
    foreach ($planet->rooms as $room){
        echo "-> Room Name: $room->name<br>";
        foreach ($room->items as $item){
            echo "- -> Item: $item->id  Amount: $item->amount  <br>";
        }
    }
//echo 'Planet name: ' . $planet->rooms[0]->name . ' Planet ID:' . $planet->rooms[0]->id . "\n";
}
*/

?>
