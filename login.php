<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
</head>
<body>
  <form action="" method="post">
    Tài khoản: <input type="text" name="username">
    <br>
    Mật khẩu: <input type="password" name="password">
    <br>
    <input type="submit" name="login" value="Đăng nhập">
  </form>

  <?php
    include('./connect.php');
    if (isset($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      if ($username == '' || $password == '') {
        echo "Khong duoc de trong";
      }
      else {
        $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
        $qr = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($qr);
        if ($count !=0) {
         echo "<script>alert('Đăng nhập thành công')</script>";
        }
        else {
          echo "<script>alert('Sai tài khoản hoặc mật khẩu')</script>";
        }
      }
    }
  ?>
</body>
</html>