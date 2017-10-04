<?php

$u = strtolower($_POST["username"]);
$p = $_POST["password"];
$p2 = $_POST["password2"];
//Idenfiying variables for making code cleaner.

if (($p==$p2)&&($p!="")) { 
//Make sure passwords match and make sure the password isn't blank.

    $phash = hash("sha256", $p, false); 
    //hash password to make sure its safe
    $a = "../saves/$u"; 
    //creates array of files matching the string
    if (is_dir($a) === false){ 
    //if directory for user does not exist
        mkdir("../saves/$u");
        $myfile = fopen("../saves/$u/data.php", "w+") or die("Unable to open file!"); 
        //open file for writing
        $txt = '<?php 
                $save_username = "'.$u.'"; 
                $save_password = "'.$phash.'";
                ?>';
        fwrite($myfile, $txt);
        fclose($myfile);
        header('Location: ../index.php');
        //Writes username and password data to the file and then closes it.
        
        include('../classes/Item.php');
        include('../database/item.php');
        session_start();

        $_SESSION['inventory'] = $inventory;

        file_put_contents("../saves/$u/inventory",serialize($_SESSION['inventory']));

    } else {
        header('Location: ../register.php?error=1');
        //Username file already exists in glob array
    }
}else{
    header('Location: ../register.php?error=2');
    //Passwords do not match
}

?>