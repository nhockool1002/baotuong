<?php
include ("../config.php");
include ADROOT."/function/func.php";
spl_autoload_register("loadClass");
$obj = new Db();

$id = $_GET['id'];
$name = $_GET['name'];
$nonename = $_GET['nonename'];

$sql = "UPDATE `category` SET `catname`='$name',`catname_none`='$nonename' WHERE catid = '$id'";
$obj->select($sql);
$count = $obj->getRowCount();
echo $count;
 ?>
