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
          if(isset($_POST["btn-submit-login"])){
            $user = $_POST['loginUsername'];
            $pass = $_POST['loginPassword'];
            if ($user == "") {
                  echo "<div class='alert alert-danger' role='alert'>
                    <strong>Tên tài khoản rỗng</strong> <a href='javascript: history.go(-1)' class='alert-link'>Hãy trở lại</a> và điền đầy đủ.
                  </div>";
                  exit;
              }
              if ($pass == "") {
                    echo "<div class='alert alert-danger' role='alert'>
                      <strong>Mật khẩu rỗng</strong> <a href='javascript: history.go(-1)' class='alert-link'>Hãy trở lại</a> và điền đầy đủ.
                    </div>";
                    exit;
              }
            $obj = new Db();
            $checkusername = "SELECT username FROM users WHERE username ='$user'";
            $obj->select($checkusername);
            $count = $obj->getRowCount();

            if ($count == 0) {
                  echo "<div class='alert alert-danger' role='alert'>
                    <strong>Tên tài khoản không tồn tại</strong> <a href='javascript: history.go(-1)' class='alert-link'>Hãy trở lại</a> và điền chính xác.
                  </div>";
                  exit;
              }
            $obj1 = new User();
            $obj1->Checkinfo($user,$pass);
            $count1 = $obj1->getRowCount();

            if($count1 ==0)
            {
              echo "<div class='alert alert-danger' role='alert'>
                <strong>Mật khẩu không đúng</strong> <a href='javascript: history.go(-1)' class='alert-link'>Hãy trở lại</a> và điền chính xác.
              </div>";
              exit;
            }

            $_SESSION['user'] = $user;
              echo "<div class='alert alert-success' role='alert'>
                <strong>Bạn đã đăng nhập thành công</strong> <a href='../index.php' class='alert-link'>Trở về trang chủ</a> trong 2s nữa.
              </div>";
              header( "Refresh:2; url=../index.php");
              die();
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
