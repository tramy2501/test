<?php 
session_start();

if(isset($_SESSION['ussername'])){
unset($_SESSION['ussername']);
}

header('location:login.php');
?>