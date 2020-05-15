<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File</title>
</head>
<body>

  <form method="POST">
    Tên file: <input type="text" name="fileName"/>
    <br>
    Nội dung file: <textarea name="content"></textarea>
    <br>
    <input type="submit" name="submit" value="Ghi file"/>
    <br>
  </form>

  <?php
    if (isset($_POST["submit"])) {
      $fileName = $_POST["fileName"];
      $content = "--------------" .PHP_EOL .$_POST["content"];
      $fileOpen = fopen($fileName .'.txt', 'a');
      $writeFile = fwrite($fileOpen, $content);
      if ($writeFile) {
        echo "Ghi file thành công";
      }
      else {
        echo "Không ghi file được";
      }

      $file = fopen($fileName .".txt", 'r')
      or exit ('Không tìm thấy file');

      while(!feof($file)) {
        echo fgets($file) . "<br>";
      }
    }
  ?>
</body>
</html>
