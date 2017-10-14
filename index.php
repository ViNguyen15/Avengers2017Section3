<?php 
//foreach (glob("interface/*.php") as $interface) {
//    include("$interface");
//}
foreach (glob("classes/*.php") as $class) {
    include("$class");
}

//Include all of the classes

session_start();
//Starts the session

// Temporary Code: Creates game map. Sets Game map to the session
if(!isset($_SESSION['game'])){
    include('database/rooms.php');
    $_SESSION['game'] = $planets;
}
 //$_SESSION['location'] = $_SESSION['game'][0];
//Temporary Code End


if ($_SESSION['loggedin']!=true){
    header('Location: register.php');
}
//if user is not logged in, redirect to Register.php

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>
    <title>Text-Based Game</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo time();?>" />
</head>

<body>
<header>
    <h1>< GAME TITLE ></h1>

    <form action="function/logout.php" method="post"><input type="submit" value="Logout"></form>
    <form action="function/save.php" method="post"><input type="submit" value="Save Game"></form>

</header>

<div id="main">

<article>
    
    <?php
    include("function/display_room.php");
    ?>

</article>

<nav>
    <?php 
    echo "Username: ".$_SESSION['username'];
    ?>

    <br>

    <?php
    include("function/display_inv.php");
    ?>
</nav>

<map>
    Map
</map>

</div>

<footer>Footer</footer>

</body> 
<?php
if (isset($_GET["save"])&&$_GET["save"]==1){
    echo "<style id=\"savegame\">body, input, img {cursor:progress !important;}</style>";  
    echo "<script type=\"text/javascript\">setTimeout(function() { var element = document.getElementById(\"savegame\"); element.outerHTML =    \"\"; delete element; }, 1500);</script>";
}
?>
