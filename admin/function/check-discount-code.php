<?php
include ("../config.php");
include ADROOT."/function/func.php";
spl_autoload_register("loadClass");
$obj = new Db();

$code = $_GET['code'];
$sql = "SELECT discount_code FROM discount WHERE discount_code = '$code'";
$obj->select($sql);
$count = $obj->getRowCount();
echo $count;
?>
