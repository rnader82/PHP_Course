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

$query_str = $_GET['query_str']
$sql = 'SELECT  lastname,
                firstname,
                email
           FROM MyGuests
          WHERE lastname LIKE ?';

$q = $pdo->prepare($sql);
$q->execute(['%'.query_str]);
$q->setFetchMode(PDO::FETCH_ASSOC);

while ($r = $q->fetch()) {
    echo sprintf('%s <br/>', $r['lastname']);
}


//This will close the connection
$conn = null;
?>
