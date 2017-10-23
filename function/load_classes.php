<?php
/**
~~~~~~~~~~~~~~~ Load Classes ~~~~~~~~~~~~~~~
    
    Description:
    *This function loads all of the interfaces and classes.

    Helpful Information:
	*Loads interfaces first because they are needed to create structure for classes.

*/

foreach (glob("../interface/*.php") as $interface) {
    include("$interface");
}
foreach (glob("../classes/*.php") as $class) {
    include("$class");
}


?>