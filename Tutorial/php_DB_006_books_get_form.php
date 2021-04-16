<?php
require "db_config.php";
if(isset($_GET['book_author'])) {
    $book_author = $_GET['book_author'];
}
try {
    $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}




$sql = 'SELECT b.id, b.book_name, b.book_edition, b.book_year, a.author_name, p.publisher_name, b.book_language FROM `books` b left join `authors` a on b.`book_author` = a.id left join publishers p on p.id = b.book_publisher where b.book_author = :book_author';

$sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':book_author' =>  $book_author));

$red = $sth->fetchAll();
// echo "<pre>";
// var_dump($red);
//This will close the connection
$conn = null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Practive 1</title>


<style>

table tr:first-child {
background-color: #666;
color: #ffffff;
}

table tr:nth-child(2n+2) {
background-color: #c0c0c0;
color: #000;
}

</style>



</head>
<body>

<table>
<tr>
<th>Book title</th>
<th>Book Author</th>
<th>Publication Year</th>
<th>Publisher</th>
<th>Edition</th>
<th>Book Language</th>
</tr>
<?php
foreach($red as $book){
    echo "<tr>
  <td>".$book['book_name']."</td>
  <td>".$book['author_name']."</td>
  <td>".$book['book_year']."</td>
  <td>".$book['publisher_name']."</td>
  <td>".$book['book_edition']."</td>
  <td>".$book['book_language']."</td>
  </tr>";
}
?>

<!--
<tr>
<td>How to Buy Stocks</td>
<td>Louis Engel</td>
<td>1967</td>
</tr>

<tr>
<td>A Moveable Feast</td>
<td>Ernest Hemingway</td>
<td>1965</td>
</tr>

<tr>
<td>De La Vanité</td>
<td>Michel De Montaigne</td>
<td>1965</td>
</tr>

<tr>
<td>Les Contemplations</td>
<td>Victor Hugo</td>
<td>1985</td>
</tr>

<tr>
<td>Michel Strogoff</td>
<td>Jules Verne</td>
<td>1967</td>
</tr> -->

</table>




</body>
</html>
