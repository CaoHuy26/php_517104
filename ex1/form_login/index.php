<?php
  include('./connect.php');
  if (isset($_POST['ok'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if ($user == '' || $pass == '') {
      echo "Khong duoc de trong";
    }
    else {
      $sql = "SELECT * FROM ... WHERE ... = '$user' and ... = '$pass'";
      $qr = mysqli_query($con, $sql);
      $count = mysqli_num_rows($qr);
      if ($count == 1) { //Login thanh cong
       header(location('select.php')); //header: redirect
      }
      else {
        echo "Login khong thanh cong";
      }
    }
  }
?>