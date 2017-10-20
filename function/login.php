<?php

foreach (glob("classes/*.php") as $class) {
    include("$class");
}
//Include all of the classes

session_start();

$u = strtolower($_POST["username"]);
$a = glob("../saves/$u/data.php");

if (count($a) != 0){
    include("../saves/$u/data.php");
    $hashed_password =  hash("sha256", $_POST["password"], false);
    if ($save_password == $hashed_password){
        header('Location: ../index.php');

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $_POST["username"];
        $_SESSION['password'] = $hashed_password;

        $_SESSION['inventory'] = unserialize(file_get_contents("../saves/$u/inventory"));
        foreach ($inventory as $item){
            if (!existsInArray($item, $_SESSION['inventory'])){
                $_SESSION['inventory'][] = $item;
            }
        }
        
        $_SESSION['game'] = unserialize(file_get_contents("../saves/$u/inventory"));
        
    } else {
        header('Location: ../index.php?error=2');   //wrong password
    }
} else {
    header('Location: ../index.php?error=3');       //account doesnt exist
}

function existsInArray($entry, $array) {
    foreach ($array as $compare) {
        if ($compare->name == $entry->name) {
            return true;
        }
    }
    return false;
}

?>
<html>
<body>

</body>
</html>