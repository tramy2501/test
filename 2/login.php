<?php
//Khai báo sử dụng session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>    
<style>
   h1{
    color: rgb(199, 199, 199) ;
   } 
   div {
  background-color: rgb(255, 255, 255);
  width: 400px;
  height: 300px;
  border: 15px solid rgb(12, 156, 212);
  border-width: 40px;
  border-radius: 4px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  padding: 50px;
  margin: 200px;
  text-align: center;
}
.button {
  background-color:rgb(12, 156, 212) ; 
  border-radius: 2px;
  width: 200px;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
   </style>
<body>
    <div>
        <h1 text-align="center">Login</h1>
        <form action='login.php'  method='POST'>
            <input type="text" name="username" placeholder="Username" autocomplete="off"><br>
            <br>
            <br>
            <input type="password" name="password" placeholder="Password" autocomplete="off"><br>
            <br>
          
            <br>
            <input class="button" type="submit" name="submit" value="Sign In"><br>
            
            <br>
            <a href="lostpass.com" style="text-align:center">Lost your Password?</a>
        </form>
        <p style="text-align:center">Don't have account <a href="http://localhost/dangky/register.php">Sign up here!</a></p>
    </div>
    
<?php
require 'connect.php';

//lấy dữ liệu
if (isset($_POST['submit'])){
  $username=addslashes($_POST['username']);
  $password=addslashes($_POST['password']);

//Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
if (!$username || !$password) {
echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu";
exit;
}

// mã hóa pasword
// $password = md5($password);
var_dump($username." ".$password); 

//Kiểm tra tên đăng nhập có tồn tại không
$sql = "SELECT ID, username, password FROM users WHERE username='".$username."' AND password = '".$password."'";
$result = $conn->query($sql); //chỉ định chuỗi truy vấn 
$conn -> close();  //đóng kết nối db tránh 2 truy vấn cùng 1 lúc

if($result){
  while($row = $result->fetch_assoc()){   //lọc kết quả
    $userID = $row["ID"];
    var_dump($userID); 
  }
  $result -> free_result();

  if (isset($userID)) { //Hàm isset: Kiểm tra biến userID đã được khởi tạo hay chưa. Nếu đã tồn tại, isset sẽ trả về giá trị true.
    $_SESSION['username'] = $username;
    $_SESSION['userID'] = $userID;
    header('location: index.php');
  } else {
    echo "đăng nhập không thành công";
  }
  
}else{
  echo "Thông tin đăng nhập sai";
}
}    
?>
    </body>
</html>
    