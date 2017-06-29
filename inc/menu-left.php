<div class="col-sm-3">
  <ul class="nav nav-pills nav-stacked">
    <li class="nav-item">
      <a href="#" class="nav-link active">Danh mục sản phẩm</a>
    </li>
    <?php
      $cat = new Cat();
      $rows = $cat->SelectAllCat();
      foreach ($rows as $row) {
        $catid = $row["catid"];
     ?>
    <li class="nav-item">
      <a href="index.php?catid=<?php echo $catid; ?>" class="nav-link"><?php echo $row["catname"]; ?></a>
    </li>
    <?php
    }
    ?>
    <!-- <li class="nav-item">
      <a href="#" class="nav-link">Thiết bị chiếu sáng và phiên</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">Dụng cụ cầm tay và phiên</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">Thời trang</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">Phong thủy</a>
    </li> -->
  </ul>

  <br>

  <ul class="nav nav-pills nav-stacked">
    <li class="nav-item">
      <a href="#" class="nav-link active">Liên kết</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">Facebook</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">Zalo</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">Twitter</a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">Google</a>
    </li>
  </ul>
</div>
