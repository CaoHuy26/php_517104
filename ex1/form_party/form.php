<div id="form-party">
    <h2>Thông tin đặt tiệc</h2>
    <form action="" method="post">
      <div>
        <label for="">
          Số khách tham gia
        </label>
        <input type="text" name="numberOfCustomer">
      </div>

      <div>
        <label for="">Ngày</label>
        <input type="text" name="date">
      </div>

      <div>
        <label for="">Thời gian</label>
        <input type="radio" name="time" value="Sáng"> Sáng
        <input type="radio" name="time" value="Trưa"> Trưa
        <input type="radio" name="time" value="Tối"> Tối
      </div>

      <div>
        <label for="">Địa điểm</label>
        <input type="radio" name="location" value="Trong nhà"> Trong nhà
        <input type="radio" name="location" value="Ngoài trời"> Ngoài trời
      </div>

      <div>
        <label for="">Tên khách hàng</label>
        <input type="text" name="customerName">
      </div>

      <div>
        <label for="">Giới tính</label>
        <input type="radio" name="customerSex" value="Nam"> Nam
        <input type="radio" name="customerSex" value="Nữ"> Nữ
      </div>

      <div>
        <label for="">Địa chỉ khách hàng</label>
        <input type="text" name="customerAddress">
      </div>

      <div>
        <label for="">Các yêu cầu của khách hàng: </label>
        <textarea name="require" id="" cols="80" rows="10"></textarea>
      </div>

      <div>
        <label for="">Khách hàng biết đến nhà hàng qua: </label>
        <select name="social" id="">
          <option>Báo chí</option>
        </select>
      </div>

      <div>
        <input type="submit" name="submit" value="Đặt tiệc">
      </div>
    </form>
  </div>

<?php
  if (isset($_POST['submit'])) {
    $numberOfCustomer = $_POST['numberOfCustomer'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $customerAddress = $_POST['customerAddress'];
    $customerName = $_POST['customerName'];
    $customerSex = $_POST['customerSex'];
    $require = $_POST['require'];
    $social = $_POST['social'];

    echo "<br>Thông tin đặt tiệc của khách hàng: Đặt tiệc thành công <br>";
    echo "Số khách: ", $numberOfCustomer, ". Ngày tổ chức tiệc: ", $date, "<br>";
    echo "Thời gian tổ chức tiệc: ", $time, "<br>";
    echo "Địa điểm tổ chức: ", $location, "<br>";
    echo "Họ tên khách hàng: ", $customerName, " - Giới tính: ", $customerSex, "<br>";
    echo "Địa chỉ khách hàng: ", $customerAddress, "<br>";
    echo "Khách hàng biết đến nhà hàng thông qua: ", $social, "<br>";
    echo "Yêu cầu của khách hàng: ", $require, "<br>";

    /*
    * - Mỗi người là 200k
    * - Số người trên 20 giảm 10%
    * - Nếu đặt tiệc trong nhà giảm 5%
    * - Nếu thời gian đặc tiệc là buổi Sáng giảm 10%
    */
    $pricePerCustomer = 200000;
    $price = $numberOfCustomer * $pricePerCustomer;
    $numberOfCustomer > 20 ? $price = $price * 0.9 : $price;
    $location == "Trong nhà" ? $price = $price * 0.95 : $price;
    $time == "Sáng" ? $price = $price * 0.9 : $price;

    echo "<h4>Giá phải trả: ", $price, "</h4>";
  }
?>