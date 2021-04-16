<?php
$db_servername = "localhost";
$db_username = "root";
$db_password = "root";
$db_name="course_php_002";
//Try to connect to the db server and access the DB  or Tell me why it failed
try {
    $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
//The tell me why it failed part of the code
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
