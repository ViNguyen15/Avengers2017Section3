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

$Me_R1 = new Room(1,"Outside Power Plant");
$Mercury->rooms[] = $Me_R1;

$Me_R1->items[] = Item::itemDrop(0,15,1001);
$Me_R1->items[] = Item::itemDrop(2,2,1002);

$Me_R2 = new Room(2,"Generator Room");
$Mercury->rooms[] = $Me_R2;

$Me_R3 = new Room(3,"Destroyed Wing");
$Mercury->rooms[] = $Me_R3;
$Me_R3->items[] = Item::itemDrop(0,50,1003);
$Me_R3->items[] = Item::itemDrop(1,2,1004);

$Me_R4 = new Room(4,"Manager's Room");
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
