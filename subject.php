<?php include('./connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST">
    Name: <input type="text" name="name"/>
    <br>
    ID: <input type="text" name="id"/>
    <br>
    Class:
    <select type="text" name="class">
      <?php
        $queryClass = "SELECT * FROM class";
        $runQueryClass = mysqli_query($conn, $queryClass);
        if ($runQueryClass) {
          while ($rowClass = mysqli_fetch_array($runQueryClass)) {
      ?>
            <option value="<?php echo $rowClass["id"]?>"><?php echo $rowClass["name"]?></option>
      <?php }
        } ?>
    </select>
    <br>
    Subject:
    <br>
    PHP: <input type="checkbox" name="subject[]" value="PHP"/>
    SQL: <input type="checkbox" name="subject[]" value="SQL"/>
    Photoshop: <input type="checkbox" name="subject[]" value="Photoshop"/>
    <br>
    Linux: <input type="checkbox" name="subject[]" value="Linux"/>
    Java: <input type="checkbox" name="subject[]" value="Java"/>
    Android: <input type="checkbox" name="subject[]" value="Android"/>
    <br>
    C#: <input type="checkbox" name="subject[]" value="C#"/>
    ASP.NET: <input type="checkbox" name="subject[]" value="ASP.NET"/>
    Do hoa: <input type="checkbox" name="subject[]" value="Do hoa"/>
    <br>
    <input type="submit" value="Submit" name="submit"/>
  </form>

  <?php
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $id = $_POST['id'];
      $class = $_POST['class'];
      $subjects = $_POST['subject'];
      
      $subjectStr = '';

      foreach($subjects as $subject) {
        $subjectStr .= $subject . ' ';
      }

      $query = 
      "INSERT INTO subject(name, id, class, subject)
       VALUES('$name', '$id', '$class', '$subjectStr')";
      $run = mysqli_query($conn, $query);
      if ($run) {
        echo "<script>alert('Done')</script>";
      }
    }
  ?>
</body>
</html>