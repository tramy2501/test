<?php
$id=$_GET['id'];
require 'connect.php';

try {
    $query = "DELETE FROM todos WHERE id=$id"; var_dump($id);
    $res = mysqli_query($conn, $query);
    var_dump($res);
    if ($res) {
        return header("Location: ./index.php");
    }
} catch (Exception $e) {
    
}
$conn->close();
?>
