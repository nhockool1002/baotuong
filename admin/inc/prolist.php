<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh Sách Sản Phẩm <small class="text-muted">[Product List]</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-star"></i> Danh Sách Sản Phẩm
                    </li>
                </ol>
            </div>
        </div>
        <hr>
        <!-- /.row -->
        <div class="row">
                <div class="col-sm-4">
                  <p class="cat-title">Danh sách danh mục</p>
                  <div class="dsdm-css">
                    <?php
                    $sql ="SELECT * FROM category";
                    $obj = new Db();
                    $rows = $obj->select($sql);
                    foreach ($rows as $row) {
                    ?>
                    <p class="list-cat-pr" data-id="<?php echo $row['catid']; ?>"><a href="index.php?page=prolist&catid=<?php echo $row['catid']; ?>"><?php echo $row['catid']; ?> - <?php echo $row['catname']; ?></a></p>
                    <?php
                    }?>
                  </div>
                </div>
                <div class="col-sm-8">
                  <p class="cat-title" id="sanphamid">Tất cả sản phẩm</p>

                    <div class="row">
                      <div class="col-sm-12 test-sm-center">
                        <div class="card-deck-wrapper">
                          <div class="card-deck" id="showPR">
                            <?php
                            if( isset($_GET["num"]) ){
                                  $num = $_GET["num"];
                                  settype($num, "int");
                                }else{
                                  $num = 1;
                                }
                            $perpage = 8;
                            if(isset($_GET['catid'])){
                              $catid = $_GET['catid'];
                              $sql = "SELECT * FROM product WHERE catid ='$catid'";
                            }
                            else{
                            $sql = "SELECT * FROM product";
                            }
                            $obj = new Db();
                            $obj->select($sql);
                            $allrecord = $obj->getRowCount();
                            $totalpage = ceil($allrecord/$perpage);
                            $from = ($num-1)*$perpage;
                            if($from<0) $from=0;
                            if(isset($_GET['catid'])){
                              $catid = $_GET['catid'];
                              $sql1 = "SELECT * FROM product WHERE catid ='$catid' LIMIT $from,$perpage";
                            }
                            else {
                              $sql1 = "SELECT * FROM product LIMIT $from,$perpage";
                            }
                            $obj1 = new Db();
                            $rows = $obj1->select($sql1);
                            foreach ($rows as $row) {
                            ?>
                            <div class="card col-sm-3">
                              <img class="card-img-top" width="160px" height="100px" src="../upload/<?php echo $row['catid']; ?>/<?php echo $row['pd_img']; ?>">
                              <div class="card-block">
                                <h5 class="card-title"><?php echo $row['pd_name']; ?></h5>
                                <center><h6><?php echo $row['pd_code']; ?></h6></center>
                                <div class='card-text'><?php echo "<b>".number_format($row['pd_price'])."</b> VND"; ?></div>
                                <a href="index.php?page=editproduct&id=<?php echo $row['pd_id']; ?>">Sửa Sản Phẩm</a>
                                <hr>
                              </div>
                            </div>
                            <?php
                            } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                        if($num<1){
                          $num = 1;
                        }
                    ?>
                    <div class="row pagination">
                      <div class="col-sm-12 sm-push-10">
                          <nav>
                            <ul class="pagination pagination-lg|sm">
                              <li>
                                <a href="index.php?page=prolist&num=<?php echo $num-1; ?>" aria-label="Previous">
                                  <span aria-hidden="true">&laquo;</span>
                                  <span class="sr-only">Previous</span>
                                </a>
                              </li>
                              <?php
                              if(isset($_GET['catid'])){
                                $catid = $_GET['catid'];
                                for ($i=1; $i <= $totalpage ; $i++) {
                                  if($i == $num){
                              ?>
                              <li id="num" class="pagition-active" style="background-color:green;"><a href="index.php?page=prolist&num=<?php echo $i; ?>"><b><?php echo $i; ?></b></a></li>
                              <?php } else { ?>
                              <li><a href="index.php?page=prolist&catid=<?php echo $catid; ?>&num=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                              <?php } }

                              }
                              else{
                                for ($i=1; $i <= $totalpage ; $i++) {
                                  if($i == $num){
                              ?>
                              <li id="num" class="pagition-active" style="background-color:green;"><a href="index.php?page=prolist&num=<?php echo $i; ?>"><b><?php echo $i; ?></b></a></li>
                              <?php } else { ?>
                              <li><a href="index.php?page=prolist&num=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                              <?php } }
                              }
                                ?>
                              <li>
                                <a href="index.php?page=prolist&num=<?php echo $num+1; ?>" aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </li>
                            </ul>
                          </nav>
                      </div>
                    </div>
                </div>
        </div>
        <!-- /.row -->

        <hr>
        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
