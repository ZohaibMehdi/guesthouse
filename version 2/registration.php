<?php

require_once('includes/Database.php');

class Registration{
	protected $_email, $_password, $_db;

	public function __construct(){
		$this->_db = new Database('localhost', 'root', '', 'oodb');
	}

	public function setEmail($email){
		$this->_email = $email;
	}

	public function setPassword($pass){
		$this->_password = $pass;
	}

	private function getEmail(){
		return $this->_email;
	}

	private function getPass(){
		return $this->_password;
	}

	public function signUp(){

		if($this->checkUser() > 0){
			echo "User Exists";
		}else{
			$this->toDB();
		}

		$this->_db->disconnect();
	}

	public function signIn(){
	    if($this->checkUser() > 0){
	    	$tempMail = $this->mysql_entities_fix_string($this->_db->getDBLink(), $this->getEmail());
	    	$tempPass = $this->mysql_entities_fix_string($this->_db->getDBLink(), $this->getPass());
	    	$salt1    = "qm&h*";
		    $salt2    = "pg!@";
		    $token = hash('ripemd128', "$salt1 $tempPass $salt2");
		    $val = 0;

		    $this->_db->query("SELECT email, password, register_accept FROM `registration` WHERE email = '$tempMail'");
				//print_r($this->_db->row());
		    foreach ($this->_db->row() as $value) {
		    	if($token == $value['password']){
		    		echo "Match <br/>";
		    		if($val == $value['register_accept']){
		    			echo "Registration not Confirmed";
		    		}
		    		else{
		    			//echo "Confirmed";
							return $value['email'];
		    		}
		    	}
		    	else{
		    		echo "<script> alert('Something wrong); </script>";
		    	}
		    }
	    }
	    else{
	    	echo "No such user exists";
	    }
	}

	private function checkUser(){
		$tempMail = $this->mysql_entities_fix_string($this->_db->getDBLink(), $this->getEmail());
		$this->_db->query("SELECT email FROM `registration` WHERE email = '$tempMail'");
		return $this->_db->numRows();
	}

	private function toDB(){
		$tempMail = $this->mysql_entities_fix_string($this->_db->getDBLink(), $this->getEmail());

		$tempPass = $this->mysql_entities_fix_string($this->_db->getDBLink(), $this->getPass());

		$salt1    = "qm&h*";
	  $salt2    = "pg!@";
	  $token = hash('ripemd128', "$salt1 $tempPass $salt2");
	  // set the default value for register_accept to 0
	  $this->_db->insert("INSERT INTO `registration` (email, password, register_accept) VALUES('$tempMail', '$token', 0)");
	  echo "Thanks for Registration man";
	}

	private function mysql_entities_fix_string($connection, $string)
	{
	    return htmlentities($this->mysql_fix_string($connection, $string));
	}

	private function mysql_fix_string($connection, $string)
	{
	    if (get_magic_quotes_gpc()) $string = stripslashes($string);
	    return $connection->real_escape_string($string);
	}
}

?>
