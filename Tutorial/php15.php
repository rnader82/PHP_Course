<?php
//Associative Array
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
$age['Claude'] = 41;
unset($age['Peter']);
foreach ($age as $k=>$val){
    echo "$k's age: " . $val . "<br>";
}
?>
