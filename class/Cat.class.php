<?php
  class Cat extends Db{
    public function SelectAllCat()
	{
	$sql = "SELECT * FROM category";
	return $this->select($sql);
	}
  }
 ?>
