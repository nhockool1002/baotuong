<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src="../vendor/bootstrap.js"></script>
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <link rel="stylesheet" href="../vendor/bootstrap.css">
    <link rel="stylesheet" href="../vendor/font-awesome.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../img/logo-small.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="../img/logo-small.png" type="image/x-icon"/>
  </head>
  <body>
    <div class="container text-sm-center">
      <div class="row">
        <div class="col-sm-12">
            <img src="../img/logo-large.png" alt="" style="width:300px;">
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-sm-center">
    <?php
    include ("../config.php");
    include ROOT."/function/func.php";
    spl_autoload_register("loadClass");
    if (isset($_POST["btn-submit"])) {
      $username = $_POST["inputUserame"];
      $pass = $_POST["inputPasswords"];
      $repass = $_POST["inputPassword"];
      $email = $_POST["inputEmail"];

      if ($username == "" || $pass == "" || $repass == "" || $email == ""){
        echo "<div class='alert alert-danger' role='alert'>
          <strong>Các trường rỗng !</strong> <a href='javascript: history.go(-1)' class='alert-link'>Hãy trở lại</a> và điền đầy đủ.
        </div>";
        exit;
      }

      elseif ($pass != $repass) {
        echo "<div class='alert alert-danger' role='alert'>
          <strong>Password không trùng nhau !</strong> <a href='javascript: history.go(-1)' class='alert-link'>Hãy trở lại</a> và điền chính xác.
        </div>";
        exit;
      }

      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-danger' role='alert'>
          <strong>Email không đúng định dạng !</strong> <a href='javascript: history.go(-1)' class='alert-link'>Hãy trở lại</a> và điền chính xác.
        </div>";
        exit;
      }
      else{
      $sql = "INSERT INTO users(
                                  username,
                                  password,
                                  email
                                ) VALUES (
                                  '$username',
                                  '$pass',
                                  '$email'
                                )";
      $obj = new Db();
      $obj->select($sql);
      echo "<div class='alert alert-success' role='alert'>
        <strong>Đăng Ký Thành Công !</strong> <a href='../index.php' class='alert-link'>Trở lại</a> trang chủ.
      </div>";
      echo "<br /><div class='alert alert-info' role='alert'>
        <strong>Bạn đã đăng nhập vào hệ thống</strong></div>";
      $_SESSION['user'] = $username;
      header( "Refresh:2; url=../index.php");
      die();
      }
    }
    ?>
  </div>
</div>
</div>
  </body>
</html>
<?php
ob_end_flush()
 ?>
