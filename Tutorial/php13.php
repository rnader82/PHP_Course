<?php
//Indexed array 0        1      2
$cars = array("Volvo", "BMW", "Toyota");
$cars[] = "Jeep";//3
$cars[] = "Mercedes";//4
unset($cars[0]);
$arrlength = count($cars);

for($x = 0; $x < $arrlength; $x++) {
    echo $cars[$x];
    echo "<br>";
}

foreach($cars as $k=>$val){
    echo $val . "<br>";
}
?>
