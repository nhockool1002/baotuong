<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Thêm Danh Mục Mới <small class="text-muted">[Add New Category]</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-star"></i> Thêm Danh Mục Mới
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <div class="catlist">
          <div class="row">
            <div class="col-sm-6">
              <p class="cat-title">Danh sách Danh Mục</p>
              <table class="table">
      <thead>
        <tr>
          <th>ID Danh mục</th>
          <th>Tên mục</th>
          <th>Không dấu</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT * FROM category";
          $rows = $obj->select($sql);
          foreach ($rows as $row) {
        ?>
        <tr class="danger">
          <td class="success"><?php echo $row["catid"]; ?></td>
          <td><?php echo $row["catname"]; ?></td>
          <td><?php echo $row["catname_none"]; ?></td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
            </div>
            <div class="col-sm-6">
              <p class="cat-title">Thêm Danh mục </p>
              <br>
              <div class="row">
                <div class="col-sm-3">
                  <p class="newcatname">Nhập tên danh mục :</p>
                </div>
                <div class="col-sm-6">
                <input type="text" name="" class="form-controls" size="40" id="addcat-name">
                </div>
                <div class="col-sm-3" id="checkname">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <p class="newcatname">Nhập tên danh mục (không dấu) :</p>
                </div>
                <div class="col-sm-6">
                <input type="text" name="" class="form-controls" size="40" id="addcat-noname">
                </div>
                <div class="col-sm-3" id="checknoname">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-5">

                </div>
                <div class="col-sm-7">
                  <button type="button" class="btn btn-primary" id="addcat-button">Thêm</button>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-12 text-sm-center">
                  <div class="alert alert-info" role="alert" id="addcat-status">
                    <strong>Nhập các thông tin cho Danh mục mới</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <!-- /.row -->

        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
