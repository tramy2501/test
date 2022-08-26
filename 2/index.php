<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])){
	 header('Location: login.php');
}

require 'connect.php';

$userId = $_SESSION['userID'];

$query = "SELECT * from todos WHERE userID=$userId";
$model = mysqli_query($conn, $query);
$result = [];
while ($row = mysqli_fetch_assoc($model)) {
    $result[] = $row;
}
$statusArr = [
    '0' => [
        'name' => 'Todo',
        'class' => 'btn1'
    ],
    '1' => [
        'name' => 'In Progress',
        'class' => 'btn2'
    ],
    '2' => [
        'name' => 'Success',
        'class' => 'btn3'
    ],
]
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>TO DO</title>
    <style>
        body {

            margin-top: 80px;
            margin-bottom: 100px;
            margin-right: 100px;
            margin-left: 100px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        tr {
            border-bottom: 1px solid #ddd;
        }

        .btn-trash {
            border: 1px solid gray;
            color: gray;
            border-radius: 2px;
            padding: 12px 16px;
            cursor: pointer;
        }

        .btn {
            border: 1px solid rgb(45, 212, 241);
            color: rgb(45, 212, 241);
            border-radius: 2px;
            padding: 12px 16px;
            cursor: pointer;
        }

        .btn2 {
            background-color: rgb(255, 255, 255);
            border: 2px solid rgb(248, 195, 95);
            color: rgb(248, 195, 95);
            border-radius: 4px;
        }

        .btn1 {
            background-color: rgb(255, 255, 255);
            border: 2px solid rgb(136, 131, 131);
            color: rgb(136, 131, 131);
            border-radius: 4px;
        }

        .btn3 {
            background-color: rgb(255, 255, 255);
            border: 2px solid rgb(45, 117, 23);
            color: rgb(45, 117, 23);
            border-radius: 4px;
        }

        .btn4 {
            background-color: rgb(250, 164, 6);
            border: 2px solid rgb(13, 14, 13);
            color: rgb(13, 14, 13);
            border-radius: 4px;
        }
    </style>
</head>
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        <ul class="nav navbar-nav navbar-right">
    <li><a href="logout.php">
    <span class="glyphicon glyphicon-log-out"></span>Log out</a></li>
    </ul>
    </div>
</header>

<body>
    <h1>TODO List Demo App</h1>
    <p><mark>Do it now</mark></p>
    <div style="text-align:right">
        <button class="btn" onclick="document.location='todo-detail.php'">Add task</button>
        <br>
        <br>
        <br>
    </div>
    <table>
        <tr>
            <th class='text-center'>#</th>
            <th class='text-center'>Task name</th>
            <th class='text-center'>Status</th>
            <th class='text-center'>Edit</th>
            <th class='text-center'>Remove</th>
        </tr>
        <hr>
        <?php foreach ($result as $item) { ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['task_name'] ?></td>
                <td><button class="<?= $statusArr[$item['status']]['class'] ?>" ><?= $statusArr[$item['status']]['name'] ?></button></td>
                <td>
                    <button class="btn btn-xs">
                        <span class="glyphicon glyphicon-pencil" onclick="document.location='todo-detail.php'"></span>
                    </button>
                </td>
                <td>
                    <a href="./delete.php?id=<?= $item['id'] ?>" class="btn-trash btn-xs" onclick="return confirm('Bạn có thật sự muốn xoá?')">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>