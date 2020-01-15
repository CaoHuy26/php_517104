<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./register.css">
  <title>Register</title>
</head>
<body>
  <div id="form-register">
    <form action="" method="post">
      <div class="register">
        <h2>Đăng ký</h2>
        <input type="text" name="username" placeholder="User name">
        <br>
        <input type="text" name="password" placeholder="Password">
        <br>
        <input type="submit" name="register" value="Đăng ký">
      </div> 
    </form>
  </div>
  
  <?php
    include('./connect.php');
    if (isset($_POST['register'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      if ($username == '' || $password == '') {
        echo "Tài khoản và mật khẩu không được để trống";
      }
      else {
        $queryUserInDB = "SELECT * FROM user WHERE username = '$username'";
        $query = mysqli_query($conn, $queryUserInDB);
        $isExits = mysqli_num_rows($query);
        if ($isExits > 0) {
          echo "Tài khoản $username đã tồn tại";
        }
        else {
          $insertUserToDB = "INSERT INTO user(id, username, password) VALUES(999 ,'$username', '$password');";
          if (mysqli_query($conn, $insertUserToDB)) {
            echo "
              <script>
                alert('Đăng ký thành công');
                window.location = 'login.php';
              </script>
            ";
          }
          else {
            echo "Lỗi";
          }
        }
      }
    }
  ?>

</body>
</html>