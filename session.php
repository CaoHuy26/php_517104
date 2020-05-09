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

<br>
<br>
<br>

<table border="1" bgcolor="#FFFFCC" align="center">
  <tr>
    <td colspan="7" align="center">Danh sách khách hàng</td>
  </tr>
  <tr>
    <td>Id</td>
    <td>Username</td>
    <td>Fullname</td>
    <td>Picture</td>
    <td colspan="2">Tuỳ chọn</td>
  </tr>
  <?php
    $sqlSelect = "SELECT * FROM user";
    $runSelect = mysqli_query($conn, $sqlSelect);
    while($rowSelect = mysqli_fetch_array($runSelect)) {
  ?>
  <tr>
    <td><?php echo $rowSelect["id"]?></td>
    <td><?php echo $rowSelect["username"]?></td>
    <td><?php echo $rowSelect["fullname"]?></td>
    <td><img src="./uploads/<?php echo $rowSelect['image']?>" width="70px" height="70x" /></td>
    <td>
      <a 
        href="delete.php?delete=<?php echo $rowSelect["id"]?>"
        onclick="if(confirm('Bạn có chắc chắn xóa không')) return true; else return false;"
      >
        Xoá
      </a>
    </td>
    <td>
      <a href="edit.php?edit=<?php echo $rowSelect["id"]?>">
        Sửa
      </a>
    </td>
  </tr>
    <?php }?>

</table>