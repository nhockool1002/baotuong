<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Thêm Sản Phẩm Mới <small class="text-muted">[Add New Product]</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-star"></i> Thêm Sản Phẩm Mới
                    </li>
                </ol>
            </div>
        </div>
        <hr />
        <!-- /.row -->
        <form method="post" enctype="multipart/form-data" id="formaddproduct">

            <label for="pdname">Tên sản phẩm </label>  <label class="label label-warning"> * Important</label>
            <input type="text" class="form-control" id="pdname" placeholder="Nhập tên sản phẩm" name="pdname">
            <small class="text-muted">Tên sản phẩm sẽ hiển thị cho khách hàng lựa chọn</small>
            <br>
            <br>
            <label for="pddes">Mô tả sản phẩm</label>  <label class="label label-warning"> * Important</label>
            <textarea class="form-control" id="pddes" rows="3" placeholder="Nhập mô tả sản phẩm" name="pddes"></textarea>
            <br>

            <label for="pdprice">Giá sản phẩm</label>  <label class="label label-warning"> * Important</label>
            <input type="text" class="form-control" id="pdprice" placeholder="Nhập giá sản phẩm" name="pdprice">
            <br>

            <label for="pdcat">Chọn danh mục</label>  <label class="label label-warning"> * Important</label>
            <select class="form-control" id="pdcat" name="pdcat">
              <option value="0" selected="selected">--- Chọn danh mục </option>
              <?php
                $obj = new Db();
                $sql = "SELECT * FROM category";
                $rows = $obj->select($sql);
                foreach ($rows as $row) {
              ?>
              <option value="<?php echo $row['catid']; ?>"><?php echo $row['catid']." - ".$row['catname']; ?></option>
              <?php
            }
              ?>
            </select>
            <br>

            <label for="pdimg">Chọn hình đại diện sản phẩm</label>
            <input type="file" class="form-control-file" id="pdimg" name="pdimg">
            <small class="text-muted">File hình ảnh phải hợp lệ.</small>
            <br>

            <label>Sản phẩm nổi bật   </label>
            <label class="radio-inline">
              <input type="radio" id="inlineRadio1" value="1" name="pdspec"> Có
            </label>
            <label class="radio-inline">
              <input type="radio" id="inlineRadio2" value="0" name="pdspec" checked> Không
            </label>
            <br>
          <center>
          <button type="submit" class="btn btn-primary" id="submit-btn" name="submit-btn">Thêm</button>
          <button type="reset" class="btn btn-danger">Xóa</button>
        </center>
        </form>
        <hr>
        <div class="error" id="error">

        </div>
        <hr>
        <!-- /.row -->
        <?php
        if(isset($_POST["submit-btn"])){
            $pdname = $_POST['pdname'];
            $pddes = $_POST['pddes'];
            $pdprice = $_POST['pdprice'];
            $pdcat = $_POST['pdcat'];
            $pdimg = $_FILES['pdimg']['name'];
            if($_POST['pdspec'] == 1)
              $pdspec = 1;
            else $pdspec = 0;
            $target = ROOT."/upload/".$pdcat."/".$pdimg;
            $ins = new Db();
            $sql = "INSERT INTO `product`(`pd_name`, `pd_price`, `pd_des`, `pd_img`, `special`, `catid`)
                    VALUES ('$pdname','$pdprice','$pddes','$pdimg','$pdspec','$pdcat')";
            $ins->select($sql);
            move_uploaded_file($_FILES['pdimg']['tmp_name'],$target);

            echo $target." <b><font color='green'> - Sản phẩm đã được thêm thành công</font></b>";
            header( "Refresh:2; url=index.php?page=prolist");
          }
        ?>
        <!-- /.row -->

        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
