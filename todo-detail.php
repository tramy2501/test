<?php
require 'connect.php';

$query = "SELECT * from todo_detail";
$model = mysqli_query($conn, $query); //chỉ định chuỗi truy vấn (kết nối $conn thực hiện truy vấn select)
$result = [];
while ($row = mysqli_fetch_assoc($model)) {
    $result[] = $row;
}

?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

<head>
    <title>To do</title>
    <style>
        body {

            margin-top: 80px;
            margin-bottom: 100px;
            margin-right: 100px;
            margin-left: 100px;
        }

        p {
            font-size: 18px;
        }

        .save {
            position: absolute;
            right: 600px;
            top: 500px;
        }

        .what {
            font-size: 12px;
            color: gray;
            line-height: 30px;
        }

        .create {
            line-height: 0.1px;
        }

        hr {
            width: 50%;
            height: 1px;
            margin-top: 6px;
            margin-left: 300px;
            margin-right: 100px;
            border-width: 1px;
            border-color: black;
        }
    </style>
</head>

<body>
    <h2>To do: </h2>
    <?php foreach ($result as $key => $item) { ?>
        <div class="row item" >
            <div class="col-sm-2"></div>
            <div id="demo_<?= $key ?>" class="col-sm-6"> 
                <p class="shadow p-2 bg-white rounded"><?= $item['taskdetail'] ?></p>
            </div>
            <div class="col-sm-2">
                <button onclick="myFunction(event)" data-key="<?= $key ?>">
                    <i class="fa-solid fa-check" data-key="<?= $key ?>"></i>
                </button>
                <script>
                    function myFunction(event) {
                        // const items = document.getElementsByClassName('item')
                        const key = event.target.getAttribute('data-key')
                        // console.log(event.target.getAttribute('data-id'))
                        document.getElementById('demo_' + key).style.textDecoration = "line-through";
                    }
                </script>
            </div>
            <div class="col-sm-2">
                <a style="color:black" href="./delete-detail.php?id=<?= $item['id'] ?>">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
            <p class="what"> What do you need to do?</p>

        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
            <p class="create"> Create read.md</p>
        </div>
        <hr>
        <div class="col-sm-2"></div>
        <div class="col-sm-2"></div>
    </div>

    <div class="save">
        <button class="shadow rounded">SAVE ITEM</button>
    </div>

</body>

</html>