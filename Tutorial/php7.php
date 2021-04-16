<?php
$var1 = 1;
echo("Var1: " . $var1 . "<br/>");

switch ($var1) {
case 2:
    $var3 = 1.2;
    echo("Var3: " . $var3 . "<br/>");
    break;
case 3:
    $var3 = 1.3;
    echo("Var3: " . $var3 . "<br/>");
    break;
case 4:
    $var3 = 1.4;
    echo("Var3: " . $var3 . "<br/>");
    break;
default:
    echo "Var1 isn't 2 3 or 4 <br> Var3 doesn't exist";
}

?>
