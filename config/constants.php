<?php
   //Session starts


   //Constants to store non-repeating values
   define('SITEURL','http://localhost/Developer-PHP-Exercise');
   define('LOCALHOST','localhost');
   define('DB_USERNAME','root');
   define('DB_PASSWORD','');
   define('DB_NAME','php_exercise');
   define('TABLE_NAME','table01');

   $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die('Error: '.mysqli_error($conn));
   $db_select = mysqli_select_db($conn,DB_NAME) or die('Error: '.mysqli_error($conn));
?>