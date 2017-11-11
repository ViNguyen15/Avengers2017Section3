<?php


/**
~~~~~~~~~~~~~~~ Planets Database ~~~~~~~~~~~~~~~
    
    Description:
    *This is a database of planets that are in the game. 

    Helpful Information:
    *Each planet and room should have a different ID.
	*ID's should not change.
	*Planet information isn't used anywhere as of now.


~~~~~~~~~~~~~~~ Template ~~~~~~~~~~~~~~~

    *Create a room
    $rooms[] = new Room(ID,"NAME","DESCRIPTION");
    *Example: $rooms[] = new Room(99, "My Room", "My Room Description);

    *Add a thing at a time into the room
    $rooms[ID]->addEntity( MapItem::create(ITEM_ID,AMOUNT,"X,Y","IMAGE") );
    *Add more things at once into the room
    $rooms[ID]->addEntities( array(
                            MapItem::create(ITEM_ID,AMOUNT,"X,Y","IMAGE"), 
                            MapDoor::create(TARGET_ROOM,"X,Y","IMAGE") 
                            ));

    *

 */

$rooms = array();

/**
~~~~~~~~~~~~~~~ Mercury ~~~~~~~~~~~~~~~
*/ 
//Why does this room even exist?
$rooms[] = new Room (0,"Empty Room","Empty Room Description");


$rooms[] = new Room(1,"Outside Power Plant", "You stand outside of what appears to be a large white building that is gated off. While it is not clear what exactly it is used for, at first glance it appears to be a power plant of some sort.");
//Space Pirate(None, 100) 
//Medicine(1, Cabinet). 
//Puzzle 8 (none, 100)
$rooms[1]->addEntity( MapItem::create(1,1,"2,4","cabinet") ); //Medicine


$rooms[] = new Room(2,"Generator Room", "The center of the power plant appears to be a power plant. While it is still able to function, there is very clearly visible damage to the inside of the room, and a few parts appear to be missing.");
//Fire Giant(Engine -1, 100)
//Medicine(2, Storage Container)
 $rooms[2]->addEntity( MapItem::create(1,2,"10,5","storage_container") );
 

$rooms[] = new Room(3,"Destroyed Wing", "The west side of the plant is destroyed beyond repair. The back wall is non-existent, the only evidence that it even existed at any point is a pile of rubble surrounding the hole.");
 //Elixir(1, Storage Container)
 $rooms[3]->addEntity( MapItem::create(2,1,"5,6","storage_container") );
 

$rooms[] = new Room(4,"Manager's Room", "You enter what appears to be an office. A man sits behind a desk and stares at you, wondering what you are doing in here. While he does not seem dangerous, he is wary of your presence.");
 //Defense Drone(Plasma Sword -1, none)
//Gold (100, Cabinet)
 $rooms[4]->addEntity(MapItem::create(0,100, "14,4", "cabinet")); 




/**
~~~~~~~~~~~~~~~ Venus ~~~~~~~~~~~~~~~
*/
$rooms[] = new Room(5, "Lake", "The city is covered with a lake on the left side with a yacht on the corner to get to the white house for surprises. On the left side, we have the rock covered tomb. Be adventurous to find hidden stuff!!");
//Laser rifle(1, Hole), Medicine(1, Bag)
//Puzzle 7(none, 300)
$rooms[5]->addEntities( array(
    MapItem::create(1,1,"2,3","bag"), //Medicine
    MapItem::create(8,1, "5,7", "hole") //laser rifle
);


$rooms[] = new Room(6, "Ghost Town", "This is the best part of the city!! Due to enough amount of sun UV rays, it has sand dunes and a city where there is life, filled with pools and church. WATCH OUT!! There is something you could get harmed by.");
// Monster: Ruffian(None, 100)
//Gold (100, Cabinet), Medicine(1, Storage Container)
$rooms[6]->addEntities( array(
    MapItem::create(1,1,"10,13","storage_container"), //Medicine
    MapItem::create(0,100, "8,3", "cabinet") //Gold
);


$rooms[] = new Room(7, "Volcano", "This the smallest city of the Venus and also the city of natural disasters (Volcanoes and hurricanes) on your way ,there is wooden door blocking the way .");
//Elixir(1, Hole) 
//Gold (100, Bag)
//Puzzle 6 (Defense turret -1, 0), 
$rooms[7]->addEntities( array(
    MapItem::create(2,1,"12,5","hole"), //Elixir   
    MapItem::create(0,100, "8,3", "cabinet") //Gold
);


$rooms[] = new Room(8, "Field", "ALERT!! There is a gigantic terrific creature on a hunger strike which is carnivorous. This is the last stage of the Venus. Good Luck!!");
// "treasure box"? & elixir <-- Discrepancy btwn this and Google table (doesn't exist on here)
//Ruffian(none, 100)
//Medicine(1, Hole) 
$rooms[8]-> addEntities(array(
    MapItem::create(1,1, "6,7", "hole")
); 




/**
~~~~~~~~~~~~~~~ Earth ~~~~~~~~~~~~~~~
*/

$rooms[] = new Room(9, "Crash Site", "You wake up in a forest, dazed but uninjured. You stand up and look at your ship, which is missing many of it’s vital piec-es from your encounter with a band of space pirates. There is no way that the ship can fly in it’s current condition, so you must find another way to get off this planet. To the north, there appears to be a building, so maybe it would be best to investi-gate.");
//Worn Out robot ( Elixir -1, none) 
//Gold (100, Storage Container)
$rooms[9]->addEntities( array(
    MapItem::create(1,2,"2,3","rock"),
    MapItem::create(0,1000,"4,2","rock"),
    MapItem::create(3,1,"10,11","rock"),
    MapDoor::create(10,"5,5","building"),
    MapDoor::create(50,"7,13","shop")
)
);


$rooms[] = new Room(10, "Lab entrance", "The remains of the destroyed robot lay on the floor. The fight with the robot destroyed all machinery in the room, meaning that getting information from the room is no longer an option. Behind you is the exit of the lab, and forward, there is a door to another room.");
//Gold(100, Storage Container) 
//Puzzle 5(Plasma Knife -1, none)
$rooms[10]->addEntities( array(
    MapItem::create(1,2,"2,13","rock"),
    MapItem::create(0,10,"8,5","rock"),
    MapDoor::create(9,"5,5","building"),
    MapDoor::create(11,"13,1","building"),
)
);



$rooms[] = new Room(11, "Portal room", "You enter a room with a single portal, which is currently turned on and active.");
//Worn-out robot(Plasma Knife - 1, 100) 
//Medicine(1, Barrel)
$rooms[11]->addEntities( array(
    MapDoor::create(10,"13,1","building"),
    MapDoor::create(12,"2,5","portal")
)
);


$rooms[] = new Room(12, "Home Base",  "Upon exiting the portal, you enter a base located on the moon. The room is filled with 4 portals labelled Mercury, Venus, Earth, and Mars. There is also a shop keeper there, who looks at you, hoping that you came to buy something.");
//Nothign here except Shop portal
$rooms[12]->addEntities( array(
    MapDoor::create(11,"2,5","portal")
)
);


/**
~~~~~~~~~~~~~~~ Mars ~~~~~~~~~~~~~~~
*/

$rooms[] = new Room(13, "Trap Room", "When you enter the room ,you see a trap holes in front of you as well as across the room and the room is filled with bunch of furniture and hidden treasure  box for the rewards.");
// medicine <- desc. not on G table
//Defense Drone(none, none)
//Gold(100, Cabinet)
//Plasma Sword (1, Barrel), Medicine (1, Bag)
//Puzzle 4(none, 100)



$rooms[] = new Room(14, "Wasteland", "You walk into most disastrous room on the planet and the monster is waiting for you in the corner. There is a medication in the room and few other rewards once you kill the monster.");
//Gold (100, Cabinet) Medicine (1, Bag)



$rooms[] = new Room(15, "Phobos", "You walk into most disastrous room on the planet and the monster is waiting for you in the corner. There is a medication in the room and few other rewards once you kill the monster.");
// elixir & 100 gold -> Not on G table 
//Fire Giant (none, 200)
//Medicine(1, Barrel), Laser Rifle (1, Hole) 
//Puzzle 3(none, 200)



$rooms[] = new Room(16, "Deimos", "Human civilization was crucial to colonize on one of these moons as human population was growing, so this moon was filled with plenty of hidden medication under the sand dunes.");
//Defense Drone(none, 100)
//Medicine(1, Barrel)





/**
~~~~~~~~~~~~~~~ Jupiter ~~~~~~~~~~~~~~~
*/

$rooms[] = new Room(17, "Europa", "This is a big moon of Jupiter and has subsurface oceans. Human colonist set up civilizations in these subsurface oceans that also contain life native to the moon.");
// Krakken(Wings - 1, 0)



$rooms[] = new Room(18, "Ganymede", "Ganymede is the biggest moon in the solar system which attracted many humans to come and colonize it. It rapidly became the most densely populated place in the solar system.");
//Gold(200, Bag)



$rooms[] = new Room(19,"Io", "This moon has over 400 active volcanoes. Scientist attempted to set up geothermal power plants on the moon but the volcanoes were less dormant than the scientist expected leaving only remains behind.");
//Fire Giant (none, 200)


//!!!! This room doesn't even exist?! 
$rooms[] = new Room(20,"Calisto", "Calisto is one of the oldest moons in the solar system. Its surface is filled with ice and craters making it a very hostile environment to live in.");



$rooms[] = new Room(21, "Amalthea", "This moon has an amazing view of Jupiter. Because of its great view a religious cult was set up on the moon to worship Jupiter's big red spot.");
//Minerals(1, Barrel)
//Puzzle 0 (none, laser rifle -1)




/**
~~~~~~~~~~~~~~~ Saturn ~~~~~~~~~~~~~~~
*/

$rooms[] = new Room(22, "Titan", "This large moon is a barren orange color due to its atmosphere.  The Surface of Titan is flat as it lacks huge craters and towering mountains. Tall dunes stretch across the surface far and wide. Abandoned settlements stretch across the surface.");
//Space Pirate(none, 100)
//Medicine (1, Barrel), Elixir (1, Bag), Gold (100, Hole) 



$rooms[] = new Room(23, "Euceladus", "Euceladus is a white-like color due to the surface being made up entirely of ice. Massive geysers frequently spew water from the moon's Subsurface Ocean into space. Abandoned mining operations surround the geysers to collect materials around the area.");
// Space Pirate (none, 100)
//Minerals (1,hole), Gold (100,cabinet)



$rooms[] = new Room(24, "Mimas", "Mimas is a small moon that was considered to insubstantial to establish a human colony, as a result, pirates who raid trade shipments established a base here now long abandoned.");
//Space Pirate Captain(Communication Network -1, none) 



$rooms[] = new Room(25, "Pandora", "Pandora is an extremely small heavily cratered, moon. In the future, it is used as a staging facility to facilitate travel between the human colonies. the remains of a star-port is still there.");
//Space Pirate (Plasma Pistol -1, none)
//Medicine (1, Storage Container), Gold (500, Hole)




$rooms[] = new Room(26, "Atlas", "Atlas is an extremely small disk-shaped moon that orbits closely around Saturn's rings. Future nations agreed to make this moon neutral to all governments and the moon became a hotbed for tourism to view Saturn’s incredible rings. Abandoned hotels and attractions sprawl across the surface of Atlas.");
// Gold (200,Cabinet)  [X 3] 




/**
~~~~~~~~~~~~~~~ Uranus ~~~~~~~~~~~~~~~
*/
//hahaha your anus

$rooms[] = new Room(27, "Umbriel", "Of all the moons of Uranus, Umbriel is the darkest, very little sunlight reaches the surface. Unwilling to found a colony on this moon, the humans created a large prison complex here");
//Defense Drone (none, 100) 
//Gold (100, Barrel), Elixir (1, Bag)



$rooms[] = new Room(28, "Titania", "Known for its high winds, numerous craters and canyons, humans established underground colonies here to hunt for resources");
//Defense Drone(none, 100)
//Minerals (1, Hole)



$rooms[] = new Room(29, "Ariel", "Ariel has vast wide-open plains that humans once used for farming. After this moon's abandonment. Agricultural villages remain scattered throughout the colony may prove useful.");
//Ruffian(Elixir -1, none)
//Medicine (1, Bag) 
//Puzzle 1(none, 100)



$rooms[] = new Room(30, "Oberon", "This large, heavily cratered moon has been set up as a research station by humans, now abandoned, the research station gives rise to many secrets...");
//Mad Scientist(Radar -1, none)
//Elixir(1, Cabinet)
//Minerals(1, Hole) 





/**
~~~~~~~~~~~~~~~ Neptune ~~~~~~~~~~~~~~~
*/
$rooms[] = new Room(31,"Triton", "Triton is an extremely large moon. Its surface is completely covered by a mostly frozen nitrogen water-ice crust. Since the moon is cold and barren humans avoided colonizing it.");
//Fire Giant(Cockpit -1, 100)
//Puzzle 9(none,100) 


$rooms[] = new Room(32, "Nereid", "This is the third largest moon of Neptune and contained valuable resources sought after by humans. They eventually mined the moon hollow and left only equipment behind.");
//Minerals (1, Hole)  
 


$rooms[] = new Room(33, "Neso", "Neso is a small non-spherical moon that is 48 million kilometers from Neptune. This moon was used as a religious cult who believed Neptunes big blue spot contained secrets to immortality.");
//Ruffian(none, 100)
//Medicine (1, Bag)



$rooms[] = new Room(34, "Naiad", "This moon is the closest satellite to Neptune and was once a thriving trading colony that humans lived on, due to tidal stretching humans had to leave before the moon would be ripped apart.");
//Minerals (2, Bag)
//Puzzle 2(Elixir-1, none)




$rooms[] = new Room(35, "Thalassa", "Thalassa is a small bare moon. It's only purpose for human colonist was to use it for sightseeing. Some people may have left some valuable things behind.");
//Space Pirate(none, 200)
//Gold(300,, Storage Container)




$rooms[] = new Shop(50, "Shop", "This is the home world shop.");
$default_room = $rooms[9];

?>
