<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh Sách Danh Mục <small class="text-muted">[Category List]</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-star"></i> Danh Sách Danh Mục
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <div class="catlist">
          <div class="row">
            <div class="col-sm-12">
              <p class="cat-title">Danh sách Danh Mục</p>
              <table class="table">
      <thead>
        <tr>
          <th>ID Danh mục</th>
          <th>Tên mục</th>
          <th>Không dấu</th>
          <th>Xóa</th>
          <th>Sửa</th>
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
          <td><button class="btn btn-primary updatecat"  data-id="<?php echo $row["catid"]; ?>" name="button" id="edit-cat-<?php echo $row["catid"]; ?>">Sửa</button></td>
          <td><button class="btn btn-danger delcat"  data-id="<?php echo $row["catid"]; ?>" name="button" id="del-cat-<?php echo $row["catid"]; ?>">Xóa</button></td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
            </div>

          </div>
        </div>
        <hr>
        <!-- /.row -->
        <div class="row">
          <div class="col-sm-12">
            <p class="cat-title">Sửa Danh Mục</p>
            <table class="table">
    <tbody>
      <tr class="primary">
        <td class="success" width="36%">ID :</td>
        <td class="success" width="34%"><input type="text" name="" class="form-controls" size="40" id="catid-edit" disabled></td>
        <td class="success" id="kqCATID" width="30%"></td>
      </tr>
      <tr class="primary">
        <td class="success">Tên danh mục :</td>
        <td class="success"><input type="text" name="" class="form-controls" size="40" id="catname-edit"></td>
        <td class="success" width="30%"></td>
      </tr>
      <tr class="primary">
        <td class="success">Tên danh mục (Không dấu):</td>
        <td class="success"><input type="text" name="" class="form-controls" size="40" id="catname-none-edit"></td>
        <td class="success" width="30%"></td>
      </tr>
      <tr class="primary">
        <td class="success" colspan="3" id="cat-status" style="text-align: center;">Vui lòng chọn danh mục cần sửa</td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:center;">
          <div class="btn btn-warning" href="#" role="button" id="cat-update" onclick="return confirmAction()">Lưu lại</div>
        </td>
      </tr>
    </tbody>
  </table>
          </div>
        </div>

        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
