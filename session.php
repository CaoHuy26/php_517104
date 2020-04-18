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