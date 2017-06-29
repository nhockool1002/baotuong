<?php
  class User extends Db{
    public function Checkinfo($username, $password)
	{
	$sql = "SELECT username, password FROM users WHERE username= :username AND password= :password";
	$arr[":username"] = $username;
	$arr[":password"] = $password;
	return $this->select($sql, $arr);
	}
  }
?>
