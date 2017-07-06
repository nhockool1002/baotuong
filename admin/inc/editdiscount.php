<?php
  $id = $_GET['id'];
  $sql = "SELECT * FROM discount WHERE discount_id = '$id'";
  $obj1 = new Db();
  $row = $obj->select1($sql);
  $code = $row['discount_code'];
  $content = $row['discount_content'];
  $start = $row['discount_start'];
  $end = $row['discount_end'];
 ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Sửa Chương trình Khuyến Mãi <small class="text-muted">[Edit Discount Program]</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-star"></i> Sửa Chương trình Khuyến Mãi
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-sm-7">
            <form id="formdiscount" method="post">
              <label for="">Nhập mã khuyến mãi :</label>
              <input class="form-control" type="text" name="id-discount" id="id-discount" placeholder="XSD122514" value="<?php echo $code; ?>">
              <small class="text-muted">Mã khuyến mãi được dùng trong quản lý vui lòng không nhập trùng.</small><br><br>
              <label for="">Nội dung khuyến mãi :</label>
              <textarea class="form-control" name="ct-discount" id="ct-discount" rows="4" cols="100"><?php echo $content; ?></textarea>
              <small class="text-muted">Nội dung khuyến mãi sẽ hiển thị cho khách hàng thấy.</small><br><br>
              <label for="">Từ ngày :</label>
              <input class="form-control" type="text" name="start-discount" id="start-discount" value="<?php echo $start; ?>" style="width: 100px;" placeholder="DD-MM-YYYY">
              <br>
              <label for="">Đến ngày :</label>
              <input class="form-control" type="text" name="end-discount" id="end-discount" value="<?php echo $end; ?>" style="width: 100px;" placeholder="DD-MM-YYYY"><br>
              <div class="error-discount" id="error-discount">
              </div>
              <center><button type="submit" class="btn btn-primary" name="edit-discount" id="edit-discount">Sửa</button></center>
            </form>
            <hr>

          </div>
          <div class="col-sm-5 text-sm-center">
              <center><span class="label label-danger text-sm-center">--Quảng Cáo--</span></center><br>
              <a href="http://donkeymails.com/pages/index.php?refid=kanghead1002">
                <img src="http://www.donkeymails.com/images/banner6.gif" border="0" alt="DonkeyMails.com: No Minimum Payout" width="100%">
              </a><br><br>
              <a href="http://donkeymails.com/pages/index.php?refid=kanghead1002">
                <img src="http://www.donkeymails.com/images/banner5.gif" border="0" alt="DonkeyMails.com: No Minimum Payout" width="100%"></a>
          </div>
        </div>
        <!-- /.row -->
        <?php
        if(isset($_POST['edit-discount'])){
          $iddiscount = $_POST['id-discount'];
          $ctdiscount = $_POST['ct-discount'];
          $stdiscount = $_POST['start-discount'];
          $etdiscount = $_POST['end-discount'];
          $sql = "UPDATE `discount`
                  SET `discount_code`='$iddiscount',
                      `discount_content`='$ctdiscount',
                      `discount_start`='$stdiscount',
                      `discount_end`='$etdiscount'
                      WHERE discount_id = '$id'";
          $obj = new Db();
          $obj->select($sql);
          echo " <b><font color='green'> - Khuyến mãi đã sửa thành công</font></b>";
          header( "Refresh:2; url=index.php?page=discountlist");
        }
        ?>
        <!-- /.row -->

        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
