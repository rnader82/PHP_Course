<?php
require "db_config.php";

try {
    $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = 'SELECT * FROM publishers';
$sth = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute();
$red = $sth->fetchAll();

//This will close the connection
$conn = null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Practice 2 - Add a book</title>


<style>
label {
display: block;
}

input[type=submit], input[type=reset]{
width:80px;
height:30px;
border-radius:5px;
}

</style>

</head>
<body>

<form method="post" action="./php_DB_003.php">

<p>
<label for="book_title">Book title:</label>
<input type="text" name="book_title" id="book_title" />
</p>

<p>
<label for="book_author">Choose an Author:</label>
<select name="book_author" id="book_author">
<option value="">--Choose an Author--</option>
<option value="Agatha Christie">Agatha Christie</option>
<option value="Louis Engel">Louis Engel</option>
<option value="Ernest Hemingway">Michel De Montaigne</option>
<option value="Victor Hugo">Victor Hugo</option>
<option value="Jules Verne">Jules Verne</option>
</select>
</p>

<p>
<label for="book_publisher">Choose an Publisher:</label>
<select name="book_publisher" id="book_publisher">
<option value="">--Choose an Publisher--</option>
<?php
foreach($red as $publisher){
    echo '<option value="'.$publisher['id'].'">'.$publisher['publisher_name'].'</option>';
}
?>
</select>
</p>


 <p>
<label for="book_publication">Publication Year:</label>
<input type="text" name="book_publication" id="book_publication" />
</p>
<p>
<label for="book_edition">Book Edition:</label>
<input type="text" name="book_edition" id="book_edition" />
</p>

<p>
<label for="book_lang">Language:</label>
<input type="radio" name="book_lang" value="english">English
<input type="radio" name="book_lang" value="arabic">Arabic
</p>

<p>
<label for="book_descr">Book description:</label>
<textarea name="book_descr" id="" cols="20" rows="5"></textarea>
</p>

<p>
<input type="submit" name="action" value="Add" />
<input type="reset" name="action" value="Reset" />
</p>


</form>


</body>
</html>
