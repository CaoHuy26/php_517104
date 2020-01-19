
<form method="POST">
  <h1>Tính tổng dẫy số</h1>
  <lable>Nhập dẫy số</lable>
  <input type="text" name="number"/>
  <br>
  <input type="submit" name="sum" value="Tính tổng"/>
</form>

<?php
  if (isset($_POST['sum'])) {
    $input = $_POST['number'];
    $numbers = explode(" ", $input);
    $sum = 0;
    foreach ($numbers as $number) {
      $sum += $number;
    }
    echo "Kết quả: $sum";
  }
?>

<hr width="50%">

<form method="POST">
  <h1>Mua hàng</h1>
  <lable>Loại sản phẩm</lable>
  <select id="item" name="item">
    <option selected="selected">Hàng 1</option>
    <option>Hàng 2</option>
    <option>Hàng 3</option>
  </select>
  <input id="add_item" type="submit" name="add_item" value="Thêm vào giỏ"/>
  <br>
  <lable>Giỏ hàng của bạn: </lable>
  <div id="list_item"></div>
</form>

<script>
  const items = [];
  document.getElementById("add_item").addEventListener("click", function(e) {
    e.preventDefault();
    const selector = document.getElementById("item");
    const item = selector[selector.selectedIndex].text;
    !items.includes(item) ? items.push(item) : null;
    
    document.getElementById("list_item").innerHTML = items;
  })
</script>