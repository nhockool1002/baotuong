<br>
<div class="container-fluid menu-left">
  <div class="row">
    <?php
      include ROOT."/inc/menu-left.php";
    ?>
    <div class="col-sm-9">
      <nav class="navbar navbar-inverse bg-primary text-sm-center content">
       <span>Đăng Nhập</span>
      </nav>
      <br>
      <form action="function/login-execute.php" method="post">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="container">
              <div class="row">
                <div class="col-sm-12 text-sm-center text-muted reg-subject">
                  <span>Trang Đăng Nhập</span>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <br>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12" id="showError">

                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <br>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 text-sm-right reg-title">
                  <p>Tài Khoản :</p>
                </div>
                <div class="col-sm-4 test-sm-left">
                  <input type="text" name="loginUsername" class="form-controls fatal" size="40" id="loginUsername">
                </div>
                <div class="col-sm-4 text-sm-left">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <br>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 text-sm-right reg-title">
                  <p>Mật khẩu :</p>
                </div>
                <div class="col-sm-4 test-sm-left">
                  <input type="password" name="loginPassword" class="form-controls" size="40" id="loginPassword">
                </div>
                <div class="col-sm-4 text-sm-left" id="kqPasswords">
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-sm-12 text-sm-center">
                  <button type="reset" class="btn btn-danger">Làm Lại</button>
                  <button type="submit" class="btn btn-primary" name="btn-submit-login" id="btn-submit-login">Đăng Nhập</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
