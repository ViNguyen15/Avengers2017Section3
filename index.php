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
<script src="runtime.js?v=<?php echo time();?>" type="text/javascript"></script>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>
    <title>Text-Based Game</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo time();?>" />
    
</head>

<body>

<nav class="col-1">

    <img src="images/directions.png" alt="" usemap="#Map" />

    <?php 
    echo "Username: ".$_SESSION['player']->name;
    ?>

    <br>
    <div id="inv">

    </div>

    
    <map name="Map" id="Map">
        <area alt="" title="" onclick="go(1)" href="#" shape="poly" coords="101,85,135,56,134,2,68,1,66,56" />
        <area alt="" title="" onclick="go(2)" href="#" shape="poly" coords="117,99,146,134,196,133,198,67,144,67" />
        <area alt="" title="" onclick="go(3)" href="#" shape="poly" coords="99,113,134,142,134,196,69,198,67,144" />
        <area alt="" title="" onclick="go(4)" href="#" shape="poly" coords="85,99,56,66,1,67,0,133,56,133" />
    </map>
</nav>

<div class="col-2">
<header>
    <h1>< GAME TITLE ></h1>

    <form action="function/logout.php" method="post"><input type="submit" value="Logout"></form>
    <form action="function/save.php" method="post"><input type="submit" value="Save Game"></form>

</header>
<game>
    <div id="room">

    </div>
    <user id="draw" style="<?php echo 'left:'.($_SESSION['player']->x * 32 ).'; top:'.($_SESSION['player']->y * 32 )?>">
        <img src='images/player.png' height=64px width=32px />
    </user>
</game>
</br></br>

</div>


</body>