<?php
  include ("../config.php");
  include ROOT."/function/func.php";
  spl_autoload_register("loadClass");
  $obj = new Db();
  $un = $_GET["username"];
  $sql = "SELECT * FROM users WHERE username = '$un'";
  $obj->select($sql);
  $count = $obj->getRowCount();
  echo $count;
?>
