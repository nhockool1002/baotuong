<!-- START MENU PRIMARY -->
<div class="menu-primary">
<div class="container-fluid">
 <div class="row">
   <div class="col-sm-12">
         <nav class="navbar navbar-dark bg-primary menuhead">
           <ul class="nav navbar-nav">
             <li class="nav-item active">
               <a class="nav-link first-item" href="index.php">Sản phẩm<span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle item-menu-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Danh mục</a>
               <div class="dropdown-menu">
                <?php
                    $cat = new Cat();
                    $rows = $cat->SelectAllCat();
                    if(sizeof($rows) == 0){
                      echo "Dữ Liệu Rỗng";
                    }
                    else{
                    foreach ($rows as $row) {
                      $catid = $row['catid'];
                ?>
                <a class="dropdown-item" href="index.php?catid=<?php echo $catid; ?>"><?php echo $row['catname']; ?></a>
                <?php
                }
              }
                 ?>
                </div>
             </li>
             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle item-menu-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Giỏ hàng</a>
               <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php">Xem giỏ hàng</a>
                <a class="dropdown-item" href="index.php">Thanh toán</a>
                </div>
             </li>
             <?php
                if (isset($_SESSION['user'])) {
              ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle item-menu-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bảng điều khiển</a>
                <div class="dropdown-menu">
                 <a class="dropdown-item" href="index.php">Trang cá nhân</a>
                 <a class="dropdown-item" href="index.php">Xem đơn hàng</a>
                 <a class="dropdown-item" href="index.php">Lịch sử mua hàng</a>
                 </div>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="function/logout.php">Thoát</a>
              </li>

              <?php
            }else{
              ?>
              <li class="nav-item active">
                <a class="nav-link" href="index.php?page=login">Đăng nhập</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="index.php?page=reg">Đăng ký</a>
              </li>
             <?php } ?>
           </ul>
         </nav>
   </div>
 </div>
</div>
</div>
<!-- END OF MENU PRIMARY -->
