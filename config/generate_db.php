<?php
// $servername = LOCALHOST;
// $username = DB_USERNAME;
// $password = DB_PASSWORD;
// $db_name = DB_NAME;
// $table_name = TABLE_NAME;

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "php_exercise";
$table_name = "table01";

// Create connection
$connection = new mysqli($servername, $username, $password);
// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

// Create database
$sql_cmd = "CREATE DATABASE $db_name";
$res = mysqli_query($connection,$sql_cmd);
if ($res == TRUE) {
  echo "Database created successfully";
} else {
  echo $connection->error.'. ';
}

// Create table
$db_select = mysqli_select_db($connection,$db_name) or die('Error: '.mysqli_error($connection));
$sql_cmd = "CREATE TABLE $table_name (
      id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      title VARCHAR(225) NOT NULL,
      description TEXT NOT NULL,
      image VARCHAR(225),
      status BOOLEAN,
      create_at DATETIME,
      update_at DATETIME
      )";
   
$res = mysqli_query($connection,$sql_cmd);
if ($res == TRUE) {
   echo "Database created successfully";
} else {
   echo $connection->error;
}

$connection->close();
?>