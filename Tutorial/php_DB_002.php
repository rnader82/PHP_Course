<?php
//This file connects to the DB
//@author: Ralph Nader

// Get the variables for the DB fann_get_total_connections
//var $db_servername
//var $db_name
//var $db_username
//var $db_password
require "db_config.php";

try {
    // Create PDO connection
    $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

//This will close the connection
$conn = null;
?>
