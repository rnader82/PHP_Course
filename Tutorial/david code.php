<?php require "db_config.php" ?>
<!DOCTYPE html>
<html>
<head>
<style>
#books {
  font-family: Arial;
  border-collapse: collapse;
  width: 90%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 40px;
}
input[type=text]{
      width: 20%;
      box-sizing: border-box;
      padding: 12px 20px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;

input[type=submit], input[type=reset] {
      width: 40%;
      height: 35px;
      background-color: #4CAF50;
      border: none;
      cursor: pointer;
      border-radius: 4px;
      outline: none;
    }

#books td, #books th {
  border: 1px solid #ddd;
  padding: 7px;
}

#books tr:nth-child(even){background-color: #e2e1e1;}

#books tr:hover {background-color: #ddd;}

#books th {
  text-align: left;
  background-color: #353434;
  color: white;
}

</style>
</head>
<body>
<div>
  <form action = 'POST'>
  <input type="text" id="btitle" name="btitle"><br>
  <input type="submit" name = 'search' value="Search">
  </form>
 <table id ='books'>
    <tr>
    <th>Book Title</th>
    <th>Book Author</th>
    <th>Publication year</th>
    <th>Edit</th>
    </tr> <br>
<?php

$servername = "localhost";
$username = "root";
$password = "root";

try{
    $con = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


            $stmt = $con->prepare("SELECT * from books");
            $stmt->execute();
            $red = $stmt->fetchAll();
    // echo "<pre>";
    // var_dump($red);
    //This will close the connection
            $con = null;


foreach($red as $book)
        {
    ?>
                  <tr>
                  <td> <?php echo $book['book_name']; ?></td>
                  <td> <?php echo $book['book_author']; ?></td>
                  <td> <?php echo $book['book_year']; ?></td>
                <!-- <td><a href='./book_edit.html'>Edit</a></td> -->
                </tr>
        <?php
}


?>
  </table>
  </div>
</body>
</html>
