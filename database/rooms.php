<?php

foreach (glob("../classes/*.php") as $class) {
    include("$class");
}

/**
display_room.php
index.php
*/
#  _____  _                  _       
# |  __ \| |                | |      
# | |__) | | __ _ _ __   ___| |_ ___ 
# |  ___/| |/ _` | '_ \ / _ \ __/ __|
# | |    | | (_| | | | |  __/ |_\__ \
# |_|    |_|\__,_|_| |_|\___|\__|___/

/* 
 ---------  TEMPLATE  -----------
$PLANET_NAME = new Planet(ID,"NAME");       //Creates a planet

$ROOM_1 = new Room(ID,"NAME","DESCRIPTION");    //Creates a room
$ROOM_1->addConnection(ROOM_ID, x_coordinate, y_coordinate, IMAGE_NAME);          //adds a portal in Room 1 to teleport to room 2
$ROOM_2 = new Room(ID,"NAME","DESCRIPTION");
$ROOM_3 = new Room(ID,"NAME","DESCRIPTION");


$PLANET_NAME->setRooms(array( $ROOM_1 , $ROOM_2 , $ROOM_3 ));       //Adds the rooms to the planet

 */


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
// space pirate
// medicine

$Me_R2 = new Room(2,"Generator Room", "The center of the power plant appears to be a power plant. While it is still able to function, there is very clearly visible damage to the inside of the room, and a few parts appear to be missing.");
 // ruffian
 // medicine

$Me_R3 = new Room(3,"Destroyed Wing", "The west side of the plant is destroyed beyond repair. The back wall is non-existent, the only evidence that it even existed at any point is a pile of rubble surrounding the hole.");
 //elixir

$Me_R4 = new Room(4,"Manager's Room", "You enter what appears to be an office. A man sits behind a desk and stares at you, wondering what you are doing in here. While he does not seem dangerous, he is wary of your presence.");
 // treasure chest? 100 gold
 
$Mercury->setRooms(array($Me_R1,$Me_R2,$Me_R3,$Me_R4));



# __      __                  
# \ \    / /                  
#  \ \  / /__ _ __  _   _ ___ 
#   \ \/ / _ \ '_ \| | | / __|
#    \  /  __/ | | | |_| \__ \
#     \/ \___|_| |_|\__,_|___/

$Venus = new Planet(2,"Venus");
$V_R1 = new Room(5, "Lake", "The city is covered with a lake on the left side with a yacht on the corner to get to the white house for surprises. On the left side, we have the rock covered tomb. Be adventurous to find hidden stuff!!");
// laser rifle
// medicine
$V_R2 = new Room(6, "Ghost Town", "This is the best part of the city!! Due to enough amount of sun UV rays, it has sand dunes and a city where there is life, filled with pools and church. WATCH OUT!! There is something you could get harmed by.");
// 100 gold
// medicine
// "monster" just pick on i guess
$V_R3 = new Room(7, "Volcano", "This the smallest city of the Venus and also the city of natural disasters (Volcanoes and hurricanes) on your way ,there is wooden door blocking the way .");
// elixir
// gold 100
$V_R4 = new Room(8, "Field", "ALERT!! There is a gigantic terrific creature on a hunger strike which is carnivorous. This is the last stage of the Venus. Good Luck!!");
// medicine
// "treasure box"?
// elixir

$Venus->setRooms(array($V_R1,$V_R2,$V_R3,$V_R4));

#  ______           _   _     
# |  ____|         | | | |    
# | |__   __ _ _ __| |_| |__  
# |  __| / _` | '__| __| '_ \ 
# | |___| (_| | |  | |_| | | |
# |______\__,_|_|   \__|_| |_|

$Earth = new Planet(3,"Earth");
$E_R1 = new Room(9, "Crash Site", "You wake up in a forest, dazed but uninjured. You stand up and look at your ship, which is missing many of it’s vital piec-es from your encounter with a band of space pirates. There is no way that the ship can fly in it’s current condition, so you must find another way to get off this planet. To the north, there appears to be a building, so maybe it would be best to investi-gate.");
$E_R1->addConnection(400,400,10,"Building");
$E_R1->addItems( array(
    MapItem::create(1,2,1001,"20,320","rock"),
    MapItem::create(0,100,1002,"100,350","rock"),
    MapItem::create(3,1,1003,"400,430","rock")
)
);
// 100 gold
// worn out robot
$E_R2 = new Room(10, "Lab entrance", "The remains of the destroyed robot lay on the floor. The fight with the robot destroyed all machinery in the room, meaning that getting information from the room is no longer an option. Behind you is the exit of the lab, and forward, there is a door to another room.");
$E_R2->addConnection(9,400,400,"building");
$E_R2->addConnection(11,200,210,"building");
// medicine
$E_R3 = new Room(11, "Portal room", "You enter a room with a single portal, which is currently turned on and active.");
$E_R3->addConnection(10,200,210,"building");
$E_R3->addConnection(12,100,100,"portal");

$E_M1 = new Room(12, "Home Base",  "Upon exiting the portal, you enter a base located on the moon. The room is filled with 4 portals labelled Mercury, Venus, Earth, and Mars. There is also a shop keeper there, who looks at you, hoping that you came to buy something.");
$E_M1->addConnection(11,100,100,"portal");
// shop
$Earth->setRooms(array($E_R1,$E_R2,$E_R3,$E_M1));


#  __  __                
# |  \/  |               
# | \  / | __ _ _ __ ___ 
# | |\/| |/ _` | '__/ __|
# | |  | | (_| | |  \__ \
# |_|  |_|\__,_|_|  |___/

$Mars = new Planet(4,"Mars");
$Mar_R1 = new Room(13, "Trap Room", "When you enter the room ,you see a trap holes in front of you as well as across the room and the room is filled with bunch of furniture and hidden treasure  box for the rewards.");
// plasma sword
// medicine
$Mar_R2 = new Room(14, "Wasteland", "You walk into most disastrous room on the planet and the monster is waiting for you in the corner. There is a medication in the room and few other rewards once you kill the monster.");
// medicine
$Mar_M1 = new Room(15, "Phobos", "You walk into most disastrous room on the planet and the monster is waiting for you in the corner. There is a medication in the room and few other rewards once you kill the monster.");
// elixir
// 100 gold
// laser rifle
$Mar_M2 = new Room(16, "Deimos", "Human civilization was crucial to colonize on one of these moons as human population was growing, so this moon was filled with plenty of hidden medication under the sand dunes.");
// "monster"
// "items" they couldnt even bother to list what items

#         _             _ _            
#        | |           (_) |           
#        | |_   _ _ __  _| |_ ___ _ __ 
#    _   | | | | | '_ \| | __/ _ \ '__|
#   | |__| | |_| | |_) | | ||  __/ |   
#    \____/ \__,_| .__/|_|\__\___|_|   
#                | |                   
#                |_|                   

$Jupiter = new Planet(5,"Jupiter");
$J_M1 = new Room(17, "Europa", "This is a big moon of Jupiter and has subsurface oceans. Human colonist set up civilizations in these subsurface oceans that also contain life native to the moon.");
// kraken

$J_M2 = new Room(18, "Ganymede", "Ganymede is the biggest moon in the solar system which attracted many humans to come and colonize it. It rapidly became the most densely populated place in the solar system.");
// nothing is really listed for the rest of jupiter
$J_M3 = new Room(19,"Io", "This moon has over 400 active volcanoes. Scientist attempted to set up geothermal power plants on the moon but the volcanoes were less dormant than the scientist expected leaving only remains behind.");
$J_M4 = new Room(20,"Calisto", "Calisto is one of the oldest moons in the solar system. Its surface is filled with ice and craters making it a very hostile environment to live in.");
$J_M5 = new Room(21, "Amalthea", "This moon has an amazing view of Jupiter. Because of its great view a religious cult was set up on the moon to worship Jupiter's big red spot.");

#     _____       _                    
#    / ____|     | |                   
#   | (___   __ _| |_ _   _ _ __ _ __  
#    \___ \ / _` | __| | | | '__| '_ \ 
#    ____) | (_| | |_| |_| | |  | | | |
#   |_____/ \__,_|\__|\__,_|_|  |_| |_|

$Saturn = new Planet(6,"Saturn");
$Sa_M1 = new Room(22, "Titan", "This large moon is a barren orange color due to its atmosphere.  The Surface of Titan is flat as it lacks huge craters and towering mountains. Tall dunes stretch across the surface far and wide. Abandoned settlements stretch across the surface.");
// medicine
// elixir
//gold 100
// space pirate
$Sa_M2 = new Room(23, "Enceladus", "Enceladus is a white-like color due to the surface being made up entirely of ice. Massive geysers frequently spew water from the moon's Subsurface Ocean into space. Abandoned mining operations surround the geysers to collect materials around the area.");
//minerals
// gold 150
// space pirate
$Sa_M3 = new Room(24, "Mimas", "Mimas is a small moon that was considered to insubstantial to establish a human colony, as a result, pirates who raid trade shipments established a base here now long abandoned.");
// space pirate captain
$Sa_M4 = new Room(25, "Pandora", "Pandora is an extremely small heavily cratered, moon. In the future, it is used as a staging facility to facilitate travel between the human colonies. the remains of a star-port is still there.");
// medicine
// 500 gold
// space pirate
$Sa_M5 = new Room(26, "Atlas", "Atlas is an extremely small disk-shaped moon that orbits closely around Saturn's rings. Future nations agreed to make this moon neutral to all governments and the moon became a hotbed for tourism to view Saturn’s incredible rings. Abandoned hotels and attractions sprawl across the surface of Atlas.");
// gold 200 x 3

#    _    _                           
#   | |  | |                          
#   | |  | |_ __ __ _ _ __  _   _ ___ 
#   | |  | | '__/ _` | '_ \| | | / __|
#   | |__| | | | (_| | | | | |_| \__ \
#    \____/|_|  \__,_|_| |_|\__,_|___/ 
//hahaha your anus

$Uranus = new Planet(7,"Uranus");
$U_M1 = new Room(27, "Umbriel", "Of all the moons of Uranus, Umbriel is the darkest, very little sunlight reaches the surface. Unwilling to found a colony on this moon, the humans created a large prison complex here");
// defense drone
// 100 gold
// elixir
$U_M2 = new Room(28, "Titania", "Known for its high winds, numerous craters and canyons, humans established underground colonies here to hunt for resources");
// defense drone
// minerals
$U_M3 = new Room(29, "Ariel", "Ariel has vast wide-open plains that humans once used for farming. After this moon's abandonment. Agricultural villages remain scattered throughout the colony may prove useful.");
// medicine
// defense drone
$U_M4 = new Room(30, "Oberon", "This large, heavily cratered moon has been set up as a research station by humans, now abandoned, the research station gives rise to many secrets...");
// mad scientist

#    _   _            _                    
#   | \ | |          | |                   
#   |  \| | ___ _ __ | |_ _   _ _ __   ___ 
#   | . ` |/ _ \ '_ \| __| | | | '_ \ / _ \
#   | |\  |  __/ |_) | |_| |_| | | | |  __/
#   |_| \_|\___| .__/ \__|\__,_|_| |_|\___|
#              | |                         
#              |_|                         

$Neptune = new Planet(8,"Neptune");
$N_M1 = new Room(31,"Triton", "Triton is an extremely large moon. Its surface is completely covered by a mostly frozen nitrogen water-ice crust. Since the moon is cold and barren humans avoided colonizing it.");
$N_M2 = new Room(32, "Nereid", "This is the third largest moon of Neptune and contained valuable resources sought after by humans. They eventually mined the moon hollow and left only equipment behind.");
$N_M3 = new Room(33, "Neso", "Neso is a small non-spherical moon that is 48 million kilometers from Neptune. This moon was used as a religious cult who believed Neptunes big blue spot contained secrets to immortality.");
$N_M4 = new Room(34, "Naiad", "This moon is the closest satellite to Neptune and was once a thriving trading colony that humans lived on, due to tidal stretching humans had to leave before the moon would be ripped apart.");
$N_M5 = new Room(35, "Thalassa", "Thalassa is a small bare moon. It's only purpose for human colonist was to use it for sightseeing. Some people may have left some valuable things behind.");
// space pirates
// apparently there is only one thing on this entire planet system. 

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
