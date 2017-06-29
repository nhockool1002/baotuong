<br>
<div class="container-fluid menu-left">
  <div class="row">
    <?php
      include ROOT."/inc/menu-left.php";
    ?>
    <div class="col-sm-9">
      <nav class="navbar navbar-inverse bg-primary text-sm-center content">
       <span>Đăng Ký</span>
      </nav>
      <br>
      <form action="function/register-execute.php" method="post">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="container">
              <div class="row">
                <div class="col-sm-12 text-sm-center text-muted reg-subject">
                  <span>Đăng Ký Thành Viên</span>
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
                  <input type="text" name="inputUserame" class="form-controls fatal" size="40" id="inputUsername">
                </div>
                <div class="col-sm-4 text-sm-left" id="kqUsername">
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
                  <input type="password" name="inputPasswords" class="form-controls" size="40" id="inputPasswords">
                </div>
                <div class="col-sm-4 text-sm-left" id="kqPasswords">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <br>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 text-sm-right reg-title">
                  <p>Xác nhận :</p>
                </div>
                <div class="col-sm-4 test-sm-left">
                  <input type="password" name="inputPassword" class="form-controls" size="40" id="inputPassword">
                </div>
                <div class="col-sm-4 text-sm-left" id="kqPassword">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <br>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 text-sm-right reg-title">
                  <p>Email :</p>
                </div>
                <div class="col-sm-4 test-sm-left">
                  <input type="text" name="inputEmail" class="form-controls" size="40" id='inputEmail'>
                </div>
                <div class="col-sm-4 text-sm-left" id="kqEmail">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <br>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 text-sm-center">
                  <button type="reset" class="btn btn-danger">Làm Lại</button>
                  <button type="submit" class="btn btn-primary" name="btn-submit">Đăng Ký</button>
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
