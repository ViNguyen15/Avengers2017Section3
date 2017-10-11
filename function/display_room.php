<?php
/**
index.php
 */
$game = $_SESSION['game'];


if (isset($_SESSION['location'])){
    $_SESSION['location']->display();
} else {

    foreach($game as $index => $planet){
        echo "
            <form action='function/goto_planet.php'>
            <button type='submit' name='system' value='$index'>Go to Planet $planet->name</button>
            </form>
            ";
    }

}

?>