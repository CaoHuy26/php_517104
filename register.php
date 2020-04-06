<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký</title>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    Tài khoản: <input type="text" name="username">
    <br>
    Giới tính:
    Nam <input type="radio" name="gender" value="1" checked>
    Nữ <input type="radio" name="gender" value="0">
    <br>
    Ảnh: <input type="file" name="image">
    <br>
    Mật khẩu: <input type="password" name="password">
    <br>
    Nhập lại mật khẩu: <input type="password" name="re_password">
    <br>
    <input type="submit" name="register" value="Đăng ký">
  </form>

  <?php
    include('./connect.php');
    if (isset($_POST['register'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $re_password = $_POST['re_password'];
      $gender = $_POST['gender'];
      $image = $_POST['image'];

      $queryCheckUserExists = "SELECT * FROM user WHERE username = '$username'";
      $query = mysqli_query($conn, $queryCheckUserExists);
      $isUserExits = mysqli_num_rows($query);
      if ($isUserExits > 0) {
        echo "Tài khoản $username đã tồn tại";
      }
      else {
        if ($password != $re_password) {
          echo "Mật khẩu nhập lại không đúng";
        }
        else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)) {
          echo "Tài khoản không được chứa ký tự đặc biệt";
        }
        else if (strlen($password) < 8) {
          echo "Mật khẩu phải > 8 ký tự";
        }
        else {
          // Check upload image
          $imagePath = "uploads/" .$_FILES["image"]["name"];
          $up = move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
          if ($up) {
            $queryInsertUser = 
              "INSERT INTO user(username, password, gender, image)
              VALUES('$username', '$password', '$gender', '$image')";
            if (mysqli_query($conn, $queryInsertUser)) {
              echo "<script>alert('Đăng ký thành công')</script>";
            }
            else {
              echo "Lỗi";
              echo "<br>";
              echo $queryInsertUser;
            }
          }
          else {
            echo "Upload ảnh bị lỗi";
          }

        }
      }
    }
  ?>
</body>
</html>