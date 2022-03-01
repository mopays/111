<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'myshopdb';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>

<!-- PDO
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'myshopdb';

try{
  $db = new PDO("mysql: host={$db_host}; dbname={$db_name}",$db_user, $db_password);
  $db->setAttribute(PDO::ARRT_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException){
  $e->getMessage();
}
-->
