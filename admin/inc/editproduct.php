<?php
  $id = $_GET['id'];
  $sql1 = "SELECT * FROM product WHERE pd_id = '$id'";
  $obj1 = new Db();
  $row = $obj->select1($sql1);
  $price = (int)$row['pd_price'];
  $catid = $row['catid'];
  $pic = $row['pd_img'];
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Sửa Sản Phẩm <small class="text-muted">[Edit Product]</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-star"></i> Sửa Sản Phẩm
                    </li>
                </ol>
            </div>
        </div>
        <hr />
        <!-- /.row -->
        <form method="post" enctype="multipart/form-data" id="eformaddproduct">

            <label for="pdname">Tên sản phẩm </label>  <label class="label label-warning"> * Important</label>
            <input type="text" class="form-control" id="epdname" placeholder="Nhập tên sản phẩm" name="epdname" value="<?php echo $row['pd_name']; ?>">
            <small class="text-muted">Tên sản phẩm sẽ hiển thị cho khách hàng lựa chọn</small>
            <br>
            <br>
            <label for="pddes">Mô tả sản phẩm</label>  <label class="label label-warning"> * Important</label>
            <textarea class="form-control" id="epddes" rows="3" placeholder="Nhập mô tả sản phẩm" name="epddes"><?php echo $row['pd_des']; ?></textarea>
            <br>

            <label for="pdprice">Giá sản phẩm</label>  <label class="label label-warning"> * Important</label>   (Chỉ nhập phần đầu, ví dụ 10.000 VND thì nhập 10)
            <input type="text" class="form-control" id="epdprice" placeholder="Nhập giá sản phẩm" name="epdprice" value="<?php echo $price; ?>">
            <br>

            <label for="pdcat">Chọn danh mục</label>  <label class="label label-warning"> * Important</label>
            <select class="form-control" id="pdcat" name="epdcat">
              <option value="0">--- Chọn danh mục </option>
              <?php
                $obj = new Db();
                $sql = "SELECT * FROM category";
                $rows = $obj->select($sql);
                foreach ($rows as $row) {
              ?>
              <option value="<?php echo $row['catid']; ?>" <?php if ($row['catid'] == $catid) echo "selected='select'"?>><?php echo $row['catid']." - ".$row['catname']; ?></option>
              <?php
            }
              ?>
            </select>
            <br>

            <label for="pdimg">Hình đại diện hiện tại của sản phẩm</label>
            <br>
            <img class="card-img-top" width="250px" src="../upload/<?php echo $catid; ?>/<?php echo $pic; ?>"><br><br>

            <label style="color:red; font-weight:bold;">Bạn có muốn thay đổi hình khác không ? </label>
            <label class="radio-inline">
              <input type="radio" id="inlineRadio1ss" value="1" name="picagain"> Có
            </label>
            <label class="radio-inline">
              <input type="radio" id="inlineRadio2ss" value="0" name="picagain" checked> Không
            </label>
            <br>

            <label for="epdimg">Chọn hình đại diện sản phẩm</label>
            <input type="file" class="form-control-file" id="epdimg" name="epdimg">
            <small class="text-muted">File hình ảnh phải hợp lệ.</small>
            <br>

            <label>Sản phẩm nổi bật   </label>
            <label class="radio-inline">
              <input type="radio" id="inlineRadio1" value="1" name="epdspec"> Có
            </label>
            <label class="radio-inline">
              <input type="radio" id="inlineRadio2" value="0" name="epdspec" checked> Không
            </label>
            <br>
          <center>
          <button type="submit" class="btn btn-primary" id="submit-btn" name="esubmit-btn">Sửa</button>
          <button type="reset" class="btn btn-danger">Xóa</button>
        </center>
        </form>
        <hr>
        <div class="error" id="eerror">

        </div>
        <hr>
        <!-- /.row -->
        <?php
        if(isset($_POST["esubmit-btn"])){
            $epdname = $_POST['epdname'];
            $epddes = $_POST['epddes'];
            $epdprice = $_POST['epdprice'];
            $epdcat = $_POST['epdcat'];

            if($_POST['epdspec'] == 1)
              $pdspec = 1;
            else $pdspec = 0;

            if($_POST['picagain']==0){
              $ins = new Db();
              $sql = "UPDATE `product`
                      SET `pd_name`='$epdname',
                          `pd_price`='$epdprice',
                          `pd_des`='$epddes',
                          `pd_img`='$pic',
                          `special`='$pdspec',
                          `catid`='$epdcat'
                     WHERE pd_id = '$id'";
              $ins->select($sql);
              echo " <b><font color='green'> - Sản phẩm đã được sửa thành công</font></b>";
              header( "Refresh:2; url=index.php?page=prolist");
            }
            else {
              $epdimg = $_FILES['epdimg']['name'];
              $target = ROOT."/upload/".$epdcat."/".$epdimg;
              $ins = new Db();
              $sql = "UPDATE `product`
                      SET `pd_name`='$epdname',
                          `pd_price`='$epdprice',
                          `pd_des`='$epddes',
                          `pd_img`='$epdimg',
                          `special`='$pdspec',
                          `catid`='$epdcat'
                     WHERE pd_id = '$id'";
              $ins->select($sql);
              move_uploaded_file($_FILES['epdimg']['tmp_name'],$target);
              echo $target." <b><font color='green'> - Sản phẩm đã được sửa thành công</font></b>";
              header( "Refresh:2; url=index.php?page=prolist");
            }

          }
        ?>

        <!-- /.row -->

        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
