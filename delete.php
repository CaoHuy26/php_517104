<?php
  $id = $_GET['delete'];
  include('./connect.php');

  $sql = "DELETE FROM user WHERE id=$id";
  $run = mysqli_query($conn, $sql);
  if ($run) {
    header("location:session.php");
  }
  else {
    echo "Delete Fail";
  }
?>