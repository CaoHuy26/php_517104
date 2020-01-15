<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./index.css">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <div id="container"> 
      <div class="login">
        <h2 class="thongBao">
          Xin hay dang nhap de vao sau hon
        </h2>
        <input type="text" name="user" placeholder="user">
        <input type="password" name="pass" placeholder="***">
        <input id="login" type="submit" name="login" value="Login">
      </div>
    </div>
  </form>
  <?php
    include('connect.php');
    if (isset($_POST['login'])) {
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      if ($user == '' || $pass == '') {
        echo "Khong duoc de trong";
      }
      else {
        $sql = "SELECT * FROM user WHERE username = '$user' and password = '$pass'";
        $qr = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($qr);
        if ($count !=0) {
        echo "Login thanh cong";
        }
        else {
          echo "Login khong thanh cong";
          echo "<br>";
          echo " ".$sql;
        }
      }
    }
  ?>
</body>
</html>