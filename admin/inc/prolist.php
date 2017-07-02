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
                    <p class="list-cat-pr" data-id="<?php echo $row['catid']; ?>"><?php echo $row['catid']; ?> - <?php echo $row['catname']; ?></p>
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
                            $sql = "SELECT * FROM product";
                            $obj = new Db();
                            $rows = $obj->select($sql);
                            foreach ($rows as $row) {
                            ?>
                            <div class="card col-sm-3">
                              <img class="card-img-top" width="160px" height="100px" src="../upload/<?php echo $row['catid']; ?>/<?php echo $row['pd_img']; ?>">
                              <div class="card-block">
                                <h5 class="card-title"><?php echo $row['pd_name']; ?></h5>
                                <div class='card-text'><?php echo $row['pd_price']; ?></div>
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
