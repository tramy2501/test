<?php
$id=$_GET['id'];
require 'connect.php';

try {
    $query = "DELETE FROM todo_detail WHERE id=$id";var_dump($task);
    $res = mysqli_query($conn, $query);
    
    if ($res) {
        return header("Location: ./todo-detail.php");
    }
} catch (Exception $e) {
    
}
$conn->close();
?>