<?php
  include ("../config.php");
  include ADROOT."/function/func.php";
  spl_autoload_register("loadClass");
  $obj = new Db();

  $addcatname = $_GET['addcatname'];
  $addcatnoname = $_GET['addcatnoname'];

  $sql = "SELECT * FROM category WHERE catname = '$addcatnoname'";
  $obj->select($sql);
  $count = $obj->getRowCount();

  $obj2 = new Db();
  $sql2 = "SELECT * FROM category WHERE catname_none = '$addcatnoname'";
  $obj2->select($sql2);
  $count2 = $obj2->getRowCount();

  if($count == 1 || $count2==1){
    echo "1";
  }
  else {
    $obj1 = new Db();
    $sql1 = "INSERT INTO `category`(`catname`, `catname_none`) VALUES ('$addcatname','$addcatnoname')";
    $obj1->select($sql1);
    echo 0;
  }
?>
