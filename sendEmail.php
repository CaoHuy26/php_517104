<?php
  include('./PHPMailer/src/Exception.php');
  include('./PHPMailer/src/OAuth.php');
  include('./PHPMailer/src/PHPMailer.php');
  include('./PHPMailer/src/POP3.php');
  include('./PHPMailer/src/SMTP.php');

  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\OAuth;
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\POP3;
  use PHPMailer\PHPMailer\SMTP;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Send Email</title>
</head>
<body>

  <form action="" method="post">
    Họ tên: <input type="text" name="username">
    <br>
    Mã sinh viên: <input type="text" name="msv">
    <br>
    Email: <input type="text" name="email">
    <br>
    <input type="submit" name="send" value="Gửi">
  </form>

  <?php
    if (isset($_POST['send'])) {
      $emailInput = $_POST['email'];
      $username = $_POST['username'];
      $msv = $_POST['msv'];

      $mail = new PHPMailer(true);

      try {
        //Server settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'huyc197@gmail.com'; // Email
        $mail->Password   = '';                  // Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
    
        //Recipients
        $mail->setFrom('huyc197@gmail.com');
        $mail->addAddress($emailInput);
  
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Dang nhap thanh cong';
        $mail->Body    = 'Họ tên: ' .$username. 'Mã sinh viên: ' .$msv. 'Thời gian: ' .date("Y/m/d");
    
        $mail->Send();
        echo 'Message has been sent';
      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    }
  ?>
</body>
</html>