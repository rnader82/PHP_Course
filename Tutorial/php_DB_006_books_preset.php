<?php
require "db_config.php";

try {
    $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}




$sql = 'SELECT * FROM books WHERE book_author = :book_author';

$sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':book_author' => 2));

$red = $sth->fetchAll();
echo "<pre>";
var_dump($red);
//This will close the connection
$conn = null;
?>
