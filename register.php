<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Text-Based Game</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo time();?>" />
<!--    <audio autoplay loop preload="auto" style=" width:0px;">
    <source src="starWars.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
    </audio><br/>-->
</head>

<body style=" background: url('images/tiles/space.jpg');">


<div class="col-1" style="background-color:white; padding:20px" >

    <h2>New User Login</h2>
    <form action="function/create_user.php" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        Re-type Password: <input type="password" name="password2"><br>
        <input type="submit" value="register">
    </form>

</div>
<div class="col-2" style="color:white; padding:20px">

    <h2> Existing user login: </h2>
    <form action="function/login.php" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>

    <?php         
    $i = 0;

    if (isset($_GET["error"])){
        $i = $_GET["error"];
    }
    switch ($i) {
        case 1:
            echo "<font color=red>Username is taken!</font>";
            break;
        case 2:
            echo "<font color=red>Passwords did not match.</font>";
            break;
        case 3:
            echo "i equals 2";
            break;
    }
    ?>
    
</div>


</body> 


</html>
