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

if(isset($_POST['book_title'])) {
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_publication = $_POST['book_publication'];
    $book_lang = $_POST['book_lang'];
    $book_descr = $_POST['book_descr'];
    $sql = "INSERT INTO `books`( `book_name`, `book_author`, `book_year`, `book_language`, `book_description`)
  VALUES ('$book_title','$book_author','$book_publication','$book_lang','$book_descr'); ";
}
else{
    echo "No data input!";
    exit();
}


if ($conn->exec($sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";
}

//This will close the connection
$conn = null;
?>
