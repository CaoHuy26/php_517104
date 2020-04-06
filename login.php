<?php
  session_start();
?>

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

      // Session
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;

      if ($username == '' || $password == '') {
        echo "Khong duoc de trong";
      }
      else {
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $qr = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($qr);
        if ($count == 0) {
          echo "<script>alert(`Tài khoản ${username} không tồn tại`)</script>";
        }
        else {
          $row = mysqli_fetch_array($qr);
          if ($row['password'] == $password) {
            header('location:session.php');
          }
          else {
            echo "<script>alert('Sai mật khẩu')</script>";
          }
        }
      }
    }
  ?>
</body>
</html>