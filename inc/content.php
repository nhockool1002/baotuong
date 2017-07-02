<br>
<div class="container-fluid menu-left">
  <div class="row">
    <?php
      include ROOT."/inc/menu-left.php";
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
                    $sql="SELECT * FROM product WHERE catid = '$id'";
                  }
                  else{
                    $sql="SELECT * FROM product";
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

        <div class="row">
          <div class="col-sm-12 text-sm-center">
            <nav aria-label=Pagination">
              <ul class="pagination">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
              </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
