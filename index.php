<?php

foreach (glob("interface/*.php") as $interface) {
    include("$interface");
}
foreach (glob("classes/*.php") as $class) {
    include("$class");
}
//Include all of the classes

session_start();
//Starts the session


if ($_SESSION['loggedin']!=true){
    header('Location: register.php');
}
//if user is not logged in, redirect to Register.php

?>
<html>
<header>


<style>

body {
    background: url('images/tiles/space.jpg');
}
top {
    color: white;
    font-size: 4em
}
content {
    display:block;
    margin: 0 auto;
    padding:0px;
    width:840px;
    height:720px;
    background-color: #353535;
    overflow:hidden
}
left {
    float:left;
    height:100%;
    width:490px
}
right {
    float:right;
    height:100%;
    width:340px;
    position:relative;
}

/* LEFT SIDE */
game {
    display:block;
    padding:5px 5px 10px 5px;
    height:480px;
    background:grey;
    position:relative
}

room {
    display: block;
    width:480px;
    height:480px;
    position:relative
}
user,room item,room door,room monster, room puzzle {
	position:absolute;
	width:32px;
	height:32px;
	display:block;
    cursor:pointer;
}
user img {
    position:absolute;
	bottom:0px;
}
room description {
    color:white;
    background: rgb(0, 0, 0); /* fallback color */
    background: rgba(0, 0, 0, 0.7);
}

log {
    display:block;
    margin:0 10px 10px 10px;
    height: 210px;
    overflow-y:scroll;
    background-color:grey
}

/* RIGHT SIDE */
info {
    display:block;
    height:355px;
    padding:10px;
}
player {
    display:block;
    padding:10px;
    margin:0 10px 0 0;
    background: #444444
}
inventory {

}
inventory item {
    float:left;
    margin-right:5px;
    height:48px;
    width:48px;
    position:relative;
    background:#b4d0d3
}
inventory description {
    display: block;
    position: absolute;
    background: white;
    bottom:0px
}
inventory item img {
    height:40px;
    width:40px;
}
inventory item amount {
    position:absolute;
    bottom:0px;
    right:0px;
    color: white; 
    font: bold Helvetica, Sans-Serif; 
    letter-spacing: -1px;  
    background: rgb(0, 0, 0); /* fallback color */
    background: rgba(0, 0, 0, 0.7);
    padding:2px
}
inventory item alt {
    visibility: hidden;
}
</style>

<script type="text/javascript">
window.onload = function() {
        Refresh();
    }
	function go(val){
        
        switch(val) {
            case 1:
                direction = "move_y";
                value = 1;
                break;
            case 2:
                direction = "move_x";
                value = 1;
                break;
            case 3:
                direction = "move_y";
                value = -1;
                break;
            case 4:
                direction = "move_x";
                value = -1;
                break;
        }
        Controller(direction,value);
        /*
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 Refresh();
            }
        };
        xmlhttp.open("GET", "function/Controller.php?func="+direction+"&id="+value, true);
        xmlhttp.send();
        */
    }
    function Controller(func,id){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 Refresh();
            }
        };
        xmlhttp.open("GET", "function/Controller.php?func="+func+"&id="+id, true);
        xmlhttp.send();
	}
    function RefreshPlayer(){
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("draw").setAttribute("style",this.responseText);
            }
        };
        xmlhttp.open("GET", "function/draw.php", true);
        xmlhttp.send();
    }
    function RefreshStats(){
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("stats").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "function/Controller.php?func=displayStats", true);
        xmlhttp.send();
    }
    function RefreshInventory(){
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("inv").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "function/Controller.php?func=displayInventory", true);
        xmlhttp.send();
    }
    function RefreshRoom(){
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("window").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "function/Controller.php?func=displayRoom", true);
        xmlhttp.send();
    }
    function Refresh(){
        RefreshRoom();
        RefreshStats();
        RefreshInventory();
        RefreshPlayer();
    }

	document.onkeydown = function myFunction() {
		switch (event.keyCode) {
		case 38:
            event.preventDefault();
			console.log("Up key is pressed");
			go(1)
			break;
		case 40:
            event.preventDefault();
			console.log("Down key is pressed");
			go(3)
			break;
		case 39:
            event.preventDefault();
			console.log("Right key is pressed");
			go(2)
			break;
		case 37:
            event.preventDefault();
			console.log("left key is pressed");
			go(4)
			break;
		}
	}
    
    /*
    * This script makes a description appear and disappear when you hover over the image of the item. 
    */
    function displayDescription(x) {
        document.getElementById("desc").innerHTML = x.getElementsByTagName("alt")[0].innerHTML; 
    }

    function removeDescription(x) {
        document.getElementById("desc").innerHTML = " "; 
    }
</script>
</header>


<body>
<center><top>PROJECT VOYAGER</top></center>

<content>
    <left>
        <game>
            <window id="window">

            </window>
            <user id="draw" style="<?php echo 'left:'.($_SESSION['player']->x * 32 ).'; top:'.($_SESSION['player']->y * 32 )?>">
                <img src='images/player.png' height=64px width=32px />
            </user>
        </game>

        <log>

        </log>
    </left>


    <right>
        <info>
            <img style="float:right;" src="images/playerbig.png" alt=""  />
            <stats id="stats">
            </stats>
            
            <img src="images/directions.png" width=146px alt="" usemap="#Map" />
            <map name="Map" id="Map">
                <area alt="" title="" href="#" shape="poly" coords="50,1,50,39,73,62,98,42,97,1" />
                <area alt="" title="" href="#" shape="poly" coords="84,72,107,96,146,96,145,48,105,48" />
                <area alt="" title="" href="#" shape="poly" coords="73,83,98,104,98,145,49,145,49,104" />
                <area alt="" title="" href="#" shape="poly" coords="63,72,40,48,0,48,1,97,42,98" />
            </map>
        </info>

        <player>

            <inventory id="inv">

            </inventory>
        </player>
    </right>


</content>
            <form action="function/logout.php" method="post"><input type="submit" value="Logout"></form>
            <form action="function/save.php" method="post"><input type="submit" value="Save Game"></form>

</body>

</html>