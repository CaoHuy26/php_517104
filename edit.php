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

<?php
  echo "<br><a href='logout.php'>Thoát</a>";
  echo "<a href='changePass.php'>Đổi mật khẩu</a>";
?>

<?php
  $id = $_GET["edit"];
  $sqlht = "SELECT * FROM user WHERE id=$id"; 
  $runht = mysqli_query($conn, $sqlht);
  $numht = mysqli_fetch_array($runht);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
</head>
<body>
  <form method="POST" enctype="multipart/form-data">
    <table border="1" bgcolor="#FFFFCC">
      <tr>
        <td colspan="2">Sửa thông tin</td>
      </tr>
      <tr>
        <td>Tên đăng nhập</td>
        <td><input type="text" name="username" value="<?php echo $numht["username"]?>"/></td>
      </tr>
      <tr>
        <td>Mật khẩu</td>
        <td><input type="password" name="password"/></td>
      </tr>
      <tr>
        <td>Nhập lại mật khẩu</td>
        <td><input type="password" name="re_password"/></td>
      </tr>
      <tr>
        <td>Tên đầy đủ</td>
        <td><input type="text" name="fullname" value="<?php echo $numht["fullname"]?>"/></td>
      </tr>

      <tr>
        <td colspan="2"><input type="submit" name="ok" value="Sửa"/></td>
      </tr>
    </table>
  </form>

  <?php
    if (isset($_POST["ok"])) {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $rePassword = $_POST["re_password"];
      $fullName = $_POST["fullname"];

      $sqlUpdate = "UPDATE user SET username='$username', fullname='$fullName' WHERE id=$id";
      $runUpdate = mysqli_query($conn, $sqlUpdate);
      if ($runUpdate) {
        header("location:session.php");
      }
    }
  ?>

</body>
</html>