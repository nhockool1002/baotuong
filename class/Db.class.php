<?php
class Db{
	private $_numRow;
	private $conn = null;

	public function __construct()
	{
		$host ="mysql:host=". HOST."; dbname=". DB_NAME;
		try
		{
			$this->conn = new PDO($host, DB_USER, DB_PASS);
			$this->conn->query("set names 'utf8' ");

		}
		catch (PDOException $e)
		{
			echo "Error Connect to Database";
		}
	}

	public function __destruct()
	{
		$this->conn = null;
	}

	public function lastInsertId(){
        return $this->conn->lastInsertId();
    }

	static function getIndex($index, $val=null)
	{
		if (isset($_GET[$index]))
			return $_GET[$index];
		else return $val;
	}

	private function query($sql, $arr = array(), $mode = PDO::FETCH_ASSOC)
	{
		$pre = $this->conn->prepare($sql);
		if(!$pre->execute($arr))
		{
			echo "Không thể thực thi"; exit;
		}
		$this->_numRow = $pre->rowCount();
		return $pre->fetchAll($mode);
	}
	public function select($sql, $arr = array(), $mode = PDO::FETCH_ASSOC)
	{
		return $this->query($sql, $arr, $mode);
	}
	public function bind($sql)
	{

	}
	public function getRowCount()
	{
			return $this->_numRow;
	}
}
?>
