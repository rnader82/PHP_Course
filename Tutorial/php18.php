<?php
//GET data from POST request
if(isset($_POST['f_name'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $description = $_POST['description'];
    $name = $f_name . " " . $l_name;
    echo "Hello, $name";
    echo $description;
    exit();
}

?>
<form action="./php18.php" method="post">
  <input type="text" name="f_name"/>
  <input type="text" name="l_name"/>
  <textarea name="description"></textarea>
  <input type="submit"/>

</form>
