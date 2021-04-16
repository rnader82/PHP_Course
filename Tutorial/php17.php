<?php
//GET data from url

$f_name = $_GET['f_name'];
$l_name = $_GET['l_name'];
$name = $f_name . " " . $l_name;
echo "Hello, $name";
?>
