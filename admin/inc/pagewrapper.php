<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Trang chủ <small>Tổng quan</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Trang chủ
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>  <strong>Bạn muốn thiết kế website</strong> Hãy liên hệ ngay <a href="https://www.facebook.com/godfather.1995" class="alert-link">KANGTA</a> để biết thêm chi tiết!
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-lg-4">
            <p>Danh sách Danh Mục</p>
            <table class="table text-sm-center">
    <thead>
      <tr>
        <th>ID Danh mục</th>
        <th>Tên mục</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM category LIMIT 0,5";
        $rows = $obj->select($sql);
        foreach ($rows as $row) {
      ?>
      <tr class="danger">
        <td class="success"><?php echo $row["catid"]; ?></td>
        <td><?php echo $row["catname"]; ?></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
          </div>
          <div class="col-lg-4">
            <p>Thành viên mới</p>
            <table class="table text-sm-center">
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql1 = "SELECT * FROM users
                ORDER BY user_id DESC
                LIMIT 0,5";
        $rows = $obj->select($sql1);
        foreach ($rows as $row) {
      ?>
      <tr class="warning">
        <td class="success"><?php echo $row["user_id"]; ?></td>
        <td><?php echo $row["username"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
          </div>
        </div>
        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
