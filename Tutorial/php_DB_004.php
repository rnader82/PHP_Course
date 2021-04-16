<?php
require "db_config.php";
$firstname = $_GET['firstname'];
try {
    $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = "INSERT INTO MyGuests (firstname, lastname, email, ipaddress)
VALUES ('$firstname', 'Doe', 'john@example.com','127.0.0.1')";

if ($conn->exec($sql)) {
    $last_id = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


//This will close the connection
$conn = null;
?>
