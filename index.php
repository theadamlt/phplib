<?php
require('lib.php');
$string = "lorem ipsum dolor sit amet, Consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

echo format_mail($string);

?>