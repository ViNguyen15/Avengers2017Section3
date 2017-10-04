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

        <form action="function/create_user.php" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        Re-type Password: <input type="password" name="password2"><br>
        <input type="submit" value="register">
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
  </div>
  <div id="navigation">

  </div>
  <div id="extra">
    <form action="function/login.php" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
  </div>
  <div id="footer">
    <p>Footer</p>
  </div>
</div>
</body>
</html>
