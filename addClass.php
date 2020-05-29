<form method="POST">
  Mã lớp <input type="text" name="id" />
  <br>
  Tên lớp <input type="text" name="class"/>
  <br>
  <input type="submit" name="submit"/>
</form>

<?php
  include('./connect.php');
  if (isset($_POST['submit'])) { 
    $id = $_POST['id'];
    $class = $_POST['class'];
    
    $query = 
    "INSERT INTO class(id, name)
      VALUES('$id', '$class')";
    $run = mysqli_query($conn, $query);
    if ($run) {
      echo "<script>alert('Done')</script>";
    }
    else {
      echo "<script>alert('Fail')</script>";
    }
  }
?>