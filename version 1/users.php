<?php
require_once 'includes/Database.php';

class User{
  protected $_DB;

  public function __construct(){
		$this->_DB = new Database('localhost', 'root', '', 'oodb');
	}

  public function getAll(){
    $this->_DB->query('SELECT * FROM `registration`');
    return $this->_DB->row();
  }

  public function approveUser($userID){
    $this->_DB->query("UPDATE `registration` SET `register_accept` = 1 WHERE `id` = $userID ");
  }

  public function inActiveUser($userID){
    $this->_DB->query("UPDATE `registration` SET `register_accept` = 0 WHERE `id` = $userID ");
  }
}
?>
