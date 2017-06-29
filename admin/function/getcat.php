<?php
include ("../config.php");
include ADROOT."/function/func.php";
spl_autoload_register("loadClass");
$obj = new Db();

$id = $_GET["id"];
$sql = "SELECT * FROM category WHERE catid ='$id'";


$rows = $obj->select1($sql);
$json= json_encode($rows);
echo($json);
die;
?>
