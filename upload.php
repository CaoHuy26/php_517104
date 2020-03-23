<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post" enctype="multipart/form-data">
    <input type="file" name="anh">
    <input type="submit" name="ok" value='upload'>
  </form>
</body>

<?php
  if (isset($_POST['ok'])) {
    $duongdan = $_FILES['anh']['tmp_name'];
    $tenanh = $_FILES['anh']['name'];
    $info = pathinfo($tenanh);
    if ($info["extension"] == "jpg") {
        $up = move_uploaded_file($duongdan, $tenanh);
      if ($up) {
        echo("<script>alert('Upload anh thanh cong')</script>");
      }
      else {
        echo("<script>alert('Khong upload duoc')</script>");
      }
    }
    else {
      echo('Sai dinh dang file');
    }
    
  }
?>
</html>