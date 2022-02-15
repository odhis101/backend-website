<?php
 //start session 
 session_start();

 define('HOMEURL','http://localhost:81/web-design-restaurant/');
 define('LOCALHOST','localhost');
 define('DB_USERNAME','root');
 define('DB_PASSWORD','');
 define('DB_NAME','restaurant_system');
$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($myConnection)); //Database connection
$db_select = mysqli_select_db($conn,DB_NAME)or die(mysqli_error($myConnection));
 

?>
