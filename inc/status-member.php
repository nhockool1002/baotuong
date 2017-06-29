<?php if (isset($_SESSION['user'])) {
  $username= $_SESSION['user'];
?>
<div class="logged">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 text-sm-center">
        <div class="alert alert-info" role="alert">
            Xin chào <strong><?php echo $username; ?></strong> , bạn đã đăng nhập vào Bảo Tường Trading.
        </div>
      </div>
    </div>
  </div>
</div>
  <?php
}else {
  ?>
  <div class="notlogged">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 text-sm-center">
          <div class="alert alert-danger" role="alert">
            <strong>Chú ý!</strong> Bạn chưa đăng nhập, hãy <a href="#" class="alert-link">đăng nhập</a> để sử dụng toàn bộ chức năng.
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>
