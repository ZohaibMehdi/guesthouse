<?php

class Database
{
	protected $_link, $_result, $_numRows;
	
	public function __construct($hn, $un, $pw, $db)
	{
		$this->_link = new mysqli($hn, $un, $pw, $db);
		if($this->_link->connect_error)
    		die($this->_link->connect_error);
	}

	public function getDBLink(){
		return $this->_link;
	}

	public function query($sql){
		$this->_result = $this->_link->query($sql);

		if (!$this->_result){
			die($this->_link->error);
		}else{
			$this->_numRows = $this->_result->num_rows;
		}
	}

	public function numRows(){
		return $this->_numRows;
	}

	public function row(){
		$row = array();
		for($x = 0; $x < $this->_numRows; $x++){
			$row[] = $this->_result->fetch_array(MYSQLI_ASSOC);
		}
		return $row;
	}

	public function insert($sql){
		$this->_result = $this->_link->query($sql);
		if (!$this->_result){
			die($this->_link->error);
		}
	}

	public function disconnect(){
		$this->_link->close();
	}

}
?>