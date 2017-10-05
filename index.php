<?php 

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


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Text-Based Game</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo time();?>" />
</head>
<body>
<div id="container">
<div id="header"><h1>Text-Based Game</h1></div>
  <div id="wrapper">
    <div id="content">
    <!-- Main content starts -->
      <p><strong>
      <form action="function/get_item.php">
        <button type="submit" name="item" value="Gold,10">Get 10 Gold</button>
      </form>
      </strong></p>
    
    <!-- Main content ends -->
      </div>
  </div>
  <div id="navigation">
  <!-- Navigation / Inventory starts -->
    <p><strong></strong></p>
    <?php 
        echo "Username: ".$_SESSION['username'];
    ?>
    <br>
    <form action="function/save.php" method="post"><input type="submit" value="Save Game"></form>
    <br>
    <form action="function/logout.php" method="post"><input type="submit" value="Logout"></form>
    <br>
    <?php
        include("function/display_inv.php");
    ?>
    <!-- Navigation / Inventory ends -->
  </div>
  <div id="footer">
  <!-- Footer starts -->
    <p>
        <center>
        <table bgcolor="white"><tr>
            <td>
            
            </td>
        </tr></table>
        </center>
    </p>
    <!-- Footer ends -->
  </div>
</div>
</body>
</html>
<?php
if (isset($_GET["save"])&&$_GET["save"]==1){
    echo "<div id=\"savegame\"><br><font color=green>Game Saved!</font></div>";  
    echo "<script type=\"text/javascript\">setTimeout(function() { var element = document.getElementById(\"savegame\"); element.outerHTML =    \"\"; delete element; }, 3000);</script>";
}
?>