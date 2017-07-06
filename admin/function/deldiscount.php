<?php
  include ("../config.php");
  include ADROOT."/function/func.php";
  spl_autoload_register("loadClass");
  $obj = new Db();

  $id = $_GET['id'];
  $sql = "DELETE FROM `discount` WHERE discount_id ='$id'";
  $obj->select($sql);
  $count = $obj->getRowCount();
  echo $count;
?>
