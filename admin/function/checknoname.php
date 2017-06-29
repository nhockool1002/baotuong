<?php
  include ("../config.php");
  include ADROOT."/function/func.php";
  spl_autoload_register("loadClass");
  $obj = new Db();

  $noname = $_GET['noname'];
  $sql = "SELECT * FROM category WHERE catname_none = '$noname'";

  $obj->select($sql);
  $count = $obj->getRowCount();
  echo $count;
?>
