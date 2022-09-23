<?php
session_start();

if (isset($_POST['title'])) {
    require 'connect.php';

    $title = $_POST['title'];

    if (empty($title)) {
        header("Location:index.php?mess=error");
    } else {
        $stmt = $conn->prepare("INSERT INTO todos(task_name, userID) VALUE(?, ?)");
        $stmt->bind_param('ss', $title, $_SESSION['userID']);
        $stmt->execute();
    }

    if ($res) {
        header("Location:index.php?mess=success");
    } else {
        header("Location:index.php");
    }
    $conn = null;
    exit();
} else {
    header("Location:index.php?mess=error");
}
