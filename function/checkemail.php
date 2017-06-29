<?php
  include ("../config.php");
  include ROOT."/function/func.php";
  spl_autoload_register("loadClass");
  $obj = new Db();
  $em = $_GET["email"];
  $sql = "SELECT * FROM users WHERE email = '$em'";
  $obj->select($sql);
  $count = $obj->getRowCount();
  echo $count;
?>
