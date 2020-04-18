<?php
  session_start();
  include('./connect.php');
  $us = $_SESSION['username'];
  if (empty($us)) {
    header('location:login.php');
  }
  else {
    $sql = "SELECT * FROM user WHERE username='$us'";
    $run = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($run);
  
    echo $row['fullname'];
?>
<img src='./uploads/<?php echo $row['image'] ?>' width="50px" height="50px"/>
  <?php }?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST">
    Mật khẩu hiện tại <input type="password" name="password"/>
    <br>
    Mật khẩu mới <input type="password" name="newPassword"/>
    <br>
    Nhập lại mật khẩu mới <input type="password" name="re-newPassword"/>
    <br>
    <input type="submit" value="Đổi mật khẩu" name="ok"/>
  </form>

    <?php
      if (isset($_POST['ok'])) {
        $currentPassword = $_POST['password'];
        $newPassword = $_POST['newPassword'];
        $reNewPassword = $_POST['re-newPassword'];
        if ($currentPassword == $row['password']) {
          if ($newPassword == $reNewPassword) {
            $sql = "UPDATE user SET password='$newPassword' WHERE username='$us'";
            $run = mysqli_query($conn, $sql);
            if ($run) {
              echo "Đổi mật khẩu thành công";
            }
            else {
              echo "Đổi mật khẩu không thành công";
            }
          }
          else {
            echo "Mật khẩu nhập lại không trùng nhau";
          }
        }
        else {
          echo "Mật khẩu hiện tại không đúng";
        }
      }
    ?>
</body>
</html>