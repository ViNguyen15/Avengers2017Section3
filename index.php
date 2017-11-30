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
    user-select: none;
    -moz-user-select: none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    -o-user-select: none;
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
    color:white;
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

room, shop, puzzle, battle {
    display: block;
    width:480px;
    height:480px;
    position:relative
}
battle enemy {
    position:absolute;
    top:25px;
    right:30px
}
battle player {
    position:absolute;
    bottom:153px;
    left:80px
}
battle options {
    position:absolute;
    bottom:0px;
    left:0px;
    width:100%;
    height:150px
}
battle submit {
    display:block;
    cursor:pointer;
    padding:15px;
    border-radius:5px;
    border:2px #dfe1da;
    background-color: #dfe1da;
    float:left;
    margin:5px
}
battle submit:hover {
    background-color:#c8c8b0
}
bar {
    display:block;
    width:200px;
    height:20px;
    background-color:red;
    position:relative;
}
bar hp {
    display:block;
    position:absolute;
    background-color:green;
    top:0px;
    right:0px;
    height:100%;
}
bar text {
    display:block;
    position:absolute;
    width:100%;
    height:100%;
    left:0;
    text-align:center;
}
puzzle p {
    color:white;
    display:block;
    background-color: #195b20;
    border-radius: 5px;
    width:200px;
    height: 200px;
    position:absolute;
    left:0;
    right:0;
    top:0;
    bottom:0;
    margin:auto;
    padding:10px;
    font-size: 1.15em;
}
puzzle hint {
    color:white;
    display:block;
    background-color: #0c2f10;
    border-radius: 5px;
    width:300px;
    height: 60px;
    position:absolute;
    left:0;
    right:0;
    bottom:10;
    margin:auto;
    padding:10px;
    font-size: 1.2em
}
puzzle gethint {
    display:block;
    background-color: white;
    padding:5px;
    position:absolute;
    bottom:0;
    right:0;
    cursor:pointer
}
puzzle submit {
    width:100%;
    height:50px;
    display:block;
    background-color: #0c2f10;
    border: 2px black dotted;
    text-align: center;
    cursor:pointer
}
puzzle submit:hover {
    background-color: #2e9338;
}
puzzle input {
    width:100%;
    margin:0px;
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
user:hover {
    visibility:hidden
}
room description {
    color:white;
    background: rgb(0, 0, 0); /* fallback color */
    background: rgba(0, 0, 0, 0.7);
}

log {
    display:block;
    height: 210px;
    background-color:grey
}

/* RIGHT SIDE */
info {
    display:block;
    height:355px;
    padding:10px;
}
right player {
    display:block;
    padding:10px;
    margin:0 10px 0 0;
    background: #444444;
    height:310px;
}
inventory {

}
ship item {
    float:left;
    height:42px;
    width:42px;
    position:relative;
}
inventory item, equipment item{
    float:left;
    margin-right:5px;
    margin-bottom:5px;
    height:48px;
    width:48px;
    position:relative;
    background:#b4d0d3
}
inventory description, equipment description, ship description {
    display: block;
    position: absolute;
    background: white;
    width:250px;
    bottom:20px;
    right:355px
}
inventory item img, equipment item img, ship item img {
    height:40px;
    width:40px;
}
inventory item amount, equipment item amount {
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
inventory item alt, equipment item alt, ship item alt {
    visibility: hidden;
    width:0px;
    height:0px;
    overflow:hidden;
    display:block
}
shopitem {
    float:left;
    display:block;
    overflow:hidden;
    background-color:#b4d0d3;
    margin:5px;
    width: 70px;
    height:90px;
}
shopitem:hover{
    background-color:#6f989c
}
shopitem img {
    clear:both;
    width:60px;
    height:60px;
    text-align: center
}
sell {
    float:left;
    width:50%;
    margin:0px;
    padding:0px;
}
buy {
    float:right;
    width:50%;
    margin:0px;
    padding:0px;
}
form {
    display:block;
    width: 100px;
    height:50px;

    margin-right:20px;
    float:left
}
form input {
    display:block;
    width:100%;
    height:100%;
    background-color:#b4d0d3;
    border-radius:10px;
}
stat {
    color:white;
    display:block;
    background-color:#778899;
    padding:3px
}
#desc {
    color:black;
    border-radius:5px;
    padding:5px;
    background-color:#b4d0d3;
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
    function tryAnswer(){
        var answer = document.getElementById("answer").value;
        Controller("tryAnswer",answer)
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
    function RefreshParts(){
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("ship").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "function/Controller.php?func=displayParts", true);
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
    function RefreshEquipped(){
        var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("equipment").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "function/Controller.php?func=displayEquipped", true);
        xmlhttp.send();
    }
    function Refresh(){
        RefreshRoom();
        RefreshParts();
        RefreshStats();
        RefreshEquipped();
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
    function displayHint(x) {
        document.getElementById("hint").setAttribute("style","visibility:visible"); 
    }

    function hideHint(x) {
        document.getElementById("hint").setAttribute("style","visibility:hidden"); 
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
                <area alt="" title="" onclick="go(1)" shape="poly" coords="50,1,50,39,73,62,98,42,97,1" />
                <area alt="" title="" onclick="go(2)" shape="poly" coords="84,72,107,96,146,96,145,48,105,48" />
                <area alt="" title="" onclick="go(3)" shape="poly" coords="73,83,98,104,98,145,49,145,49,104" />
                <area alt="" title="" onclick="go(4)" shape="poly" coords="63,72,40,48,0,48,1,97,42,98" />
            </map>
        </info>

        <player>
            <ship id="ship">

            </ship>
            <equipment id="equipment">

            </equipment>
            <inventory id="inv">

            </inventory>
        </player>
    </right>


</content>
<div style="margin-left:50%">
            <form action="function/logout.php" method="post"><input type="submit" value="Logout"></form>
            <form action="function/save.php" method="post"><input type="submit" value="Save Game"></form>
</div>
</body>

</html>