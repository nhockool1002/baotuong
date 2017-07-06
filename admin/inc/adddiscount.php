<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Thêm Khuyến Mãi Mới <small class="text-muted">[Add New Discount]</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-star"></i> Thêm Khuyến Mãi Mới
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-sm-7">
            <form id="formdiscount" method="post">
              <label for="">Nhập mã khuyến mãi :</label>
              <input class="form-control" type="text" name="id-discount" id="id-discount" placeholder="XSD122514">
              <div class="trk-id" id="trk-id">
                <b>Nhập vào để kiểm tra dữ liệu...</b>
              </div>
              <small class="text-muted">Mã khuyến mãi được dùng trong quản lý vui lòng không nhập trùng.</small><br><br>
              <label for="">Nội dung khuyến mãi :</label>
              <textarea class="form-control" name="ct-discount" id="ct-discount" rows="4" cols="100"></textarea>
              <small class="text-muted">Nội dung khuyến mãi sẽ hiển thị cho khách hàng thấy.</small><br><br>
              <label for="">Từ ngày :</label>
              <input class="form-control" type="text" name="start-discount" id="start-discount" value="" style="width: 100px;" placeholder="DD-MM-YYYY">
              <br>
              <label for="">Đến ngày :</label>
              <input class="form-control" type="text" name="end-discount" id="end-discount" value="" style="width: 100px;" placeholder="DD-MM-YYYY"><br>
              <div class="error-discount" id="error-discount">
              </div>
              <center><button type="submit" class="btn btn-primary" name="submit-discount" id="submit-discount">Thêm</button></center>
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
        if(isset($_POST['submit-discount'])){
          $iddiscount = $_POST['id-discount'];
          $ctdiscount = $_POST['ct-discount'];
          $stdiscount = $_POST['start-discount'];
          $etdiscount = $_POST['end-discount'];
          $sql = "INSERT INTO discount(discount_code, discount_content, discount_start, discount_end)
                  VALUES ('$iddiscount','$ctdiscount','$stdiscount','$etdiscount')";
          $obj = new Db();
          $obj->select($sql);
          echo " <b><font color='green'> - Khuyến mãi đã được thêm thành công</font></b>";
          header( "Refresh:2; url=index.php?page=discountlist");
        }
        ?>
        <!-- /.row -->

        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
