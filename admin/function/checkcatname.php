<?php
  include ("../config.php");
  include ADROOT."/function/func.php";
  spl_autoload_register("loadClass");
  $obj = new Db();

  $catname = $_GET['catname'];
  $sql = "SELECT * FROM category WHERE catname = '$catname'";

  $obj->select($sql);
  $count = $obj->getRowCount();
  echo $count;
?>
