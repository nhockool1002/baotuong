<?php
include ("../config.php");
include ADROOT."/function/func.php";
spl_autoload_register("loadClass");
$obj = new Db();

$id = $_GET['id'];
$sql = "SELECT * FROM product WHERE catid = '$id'";
$rows = $obj->select($sql);

$str = "";
$tigia = "VNĐ";
foreach ($rows as $row) {
  $str.="<div class='card col-sm-3'>";
  $str.="<img class='card-img-top' width='160px' src='../upload/".$row['catid']."/".$row['pd_img']."'>";
  $str.="<div class='card-block'>";
  $str.="<h5 class='card-title'>".$row['pd_name']."</h5>";
  $str.="<div class='card-text'>".$row['pd_price']." $tigia"."</div>";
  $str.="<a href='index.php?page=editproduct&id=".$row['pd_id']."'>Sửa Sản Phẩm</a>";
  $str.="</div></div>";
}
echo $str;
?>
