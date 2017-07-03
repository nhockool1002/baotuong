<br>
<div class="container-fluid menu-left">
  <div class="row">
    <?php
      include ROOT."/inc/menu-left.php";
      $limit = 9;
      if(isset($_GET['tab']))
      {
        $cp = $_GET['tab'];
      }
      else $cp = 1;
      $from = ($cp-1)*$limit;
    ?>
    <div class="col-sm-9">
      <nav class="navbar navbar-inverse bg-primary text-sm-center content">
       <span>Sản Phẩm</span>
      </nav>
      <br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-deck-wrapper">
              <div class="card-deck text-sm-center">
                <?php
                  if(isset($_GET['catid'])){
                    $id = $_GET['catid'];
                    $sql="SELECT * FROM product WHERE catid = '$id' LIMIT $from,$limit";
                  }
                  else{
                    $sql="SELECT * FROM product LIMIT $from,$limit";
                  }

                  $obj=new Db();
                  $rows = $obj->select($sql);
                  foreach ($rows as $row) {
                ?>
                <div class="card col-sm-4 spcontent">
                  <img class="card-img-top" src="upload/<?php echo $row['catid'] ?>/<?php echo $row['pd_img'] ?>" width="250px" height="200px"alt="><?php  echo $row['pd_name']; ?>">
                  <div class="card-block">
                    <h5 class="card-title name-pd"><?php  echo $row['pd_name']; ?></h4>
                    <div class="card-subtitle float-sm-left price-pd">
                      <span class="price">Giá :</span><span class="price-pd-details"><?php  echo $row['pd_price']; ?> VND</span>
                    </div>
                    <div class="card-subtitle float-sm-right">
                      <span class="buy-now"><a href="#">MUA NGAY</a></span><a href="#"><img class="cart-icon" src="img/cart.png" width="35px"></a>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>
              </div>
            </div>
          </div>
        </div>

<!-- PHÂN TRANG -->
<?php
if(isset($_GET['catid'])){
  $catid = $_GET['catid'];
  $gpd = new Db();
  $getallPD = "SELECT * FROM product WHERE catid = '$catid'";
  $gpd->select($getallPD);
  $countgpd = $gpd->getRowCount();
$config = array(
    'current_page'  => isset($_GET['tab']) ? $_GET['tab'] : 1, // Trang hiện tại
    'total_record'  => $countgpd, // Tổng số record
    'limit'         => 9,// limit
    'link_full'     => 'index.php?catid='.$catid.'&tab={tab}',// Link full có dạng như sau: domain/com/page/{page}
    'link_first'    => 'index.php?catid='.$catid,// Link trang đầu tiên
);
}
else{
  $gpd = new Db();
  $getallPD = "SELECT * FROM product";
  $gpd->select($getallPD);
  $countgpd = $gpd->getRowCount();
  $config = array(
      'current_page'  => isset($_GET['tab']) ? $_GET['tab'] : 1, // Trang hiện tại
      'total_record'  => $countgpd, // Tổng số record
      'limit'         => 9,// limit
      'link_full'     => 'index.php?tab={tab}',// Link full có dạng như sau: domain/com/page/{page}
      'link_first'    => 'index.php',// Link trang đầu tiên
  );
}
$paging = new Pagination();

$paging->init($config);

echo $paging->html();
?>
      </div>
    </div>
  </div>
</div>
