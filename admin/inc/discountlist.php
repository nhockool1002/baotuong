<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh Sách Khuyến Mãi <small class="text-muted">[Discount List]</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-star"></i> Danh Sách Khuyến Mãi
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-sm-7">
            <table class="table">
    <thead>
      <tr>
        <th style="width:20px; text-align: center;">Mã Khuyến Mãi</th>
        <th style="width:20px; text-align: center;">Nội dung</th>
        <th style="width:20px; text-align: center;">Tình trạng</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM discount";
        $obj = new Db();
        $rows = $obj->select($sql);
        foreach ($rows as $row) {
          $start = strtotime($row['discount_start']);
          $end = strtotime($row['discount_end']);
          $now = time();
          $status = $end - $now;
        ?>
      <tr class="<?php if($status > 0) echo "success"; else echo "danger"; ?>">
        <td style="text-align: center;"><?php echo $row['discount_code']; ?><br>
          <button type="button" class="btn btn-danger btn-xs discount-del" data-id="<?php echo $row['discount_id']; ?>">Xóa</button>
          <a href="index.php?page=editdiscount&id=<?php echo $row['discount_id']; ?>"><button type="button" class="btn btn-warning btn-xs">Sửa</button></a>
        </td>
        <td style="text-align: center;"><?php echo $row['discount_content']; ?></td>
        <td style="text-align: center;"><?php if($status > 0) echo "Đang khuyến mãi"; else echo "Hết khuyến mãi"; ?></td>
      </tr>
      <?php
      }
    ?>
    </tbody>
  </table>
              <?php
                // $str = "30-06-2017";
                // $str1 = "1-07-2017";
                // $dateFormat = date_parse_from_format("d-M-y",$str);
                // echo $str."<br>";
                // $test = strtotime($str);
                // echo $str1."<br>";
                // $test1 = strtotime($str1);
                // $str2 = $test - $test1;
                // echo $test."<br>";
                // echo $test1."<br>";
                // echo $str2."<br>";
                // print_r ($dateFormat);
              ?>
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

        <!-- /.row -->

        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
