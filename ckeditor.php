<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="./ckeditor/ckeditor.js"></script>
  <title>Ckeditor</title>
</head>
<body>
  <h2>Ckeditor</h2>
  <form action="" method="post">
    Chuyên mục
    <select>
      <option>1</option>
      <option>2</option>
    </select>

    <textarea id="editor1" name="editor1" cols="80" rows="10">
    </textarea>

    <textarea id="editor2" name="editor1" cols="80" rows="10">
    </textarea>
    <script>CKEDITOR.replace('editor1');</script> 
    <script>CKEDITOR.replace('editor2');</script> 
  </form>
</body>
</html>