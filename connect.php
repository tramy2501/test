<?php
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "todo";
$conn;

try {
  $conn = mysqli_connect($sName, $uName, $pass, $db_name);
  echo "connected";
} catch (\Exception $e) {
  echo "Connection failed :" . $e->getMessage();
}



