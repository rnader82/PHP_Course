<?php
$var1 = 3;
echo("Var1: " . $var1 . "<br/>");

$i = 4;
while($i <= $var1){
    if($i % 2 == 0) {
        echo "\$i = $i ";
    }
    $i++;
}
print("<br>".$i);
?>
