<?php
require_once('includes/Database.php');

class CheckINOUT{
  protected $_name, $_cnic, $_mobile, $_address, $_room, $_checkIN, $_checkOut, $_DB;

  public function __construct(){
		$this->_DB = new Database('localhost', 'root', '', 'oodb');
	}

  public function setName($name){
    $this->_name = $name;
  }

  public function setCNIC($cnic){
    $this->_cnic = $cnic;
  }

  public function setMob($mob){
    $this->_mobile = $mob;
  }

  public function setAddress($address){
    $this->_address = $address;
  }

  public function setRoom($room){
    $this->_room = $room;
  }

  public function setCheckIN($IN){
    $this->_checkIN = $IN;
  }

  public function setCheckOUT($OUT){
    $this->_checkOut = $OUT;
  }

  public function getName(){
    return $this->_name;
  }

  public function getCNIC(){
    return $this->_cnic;
  }

  public function getMobile(){
    return $this->_mobile;
  }

  public function getAddress(){
    return $this->_address;
  }

  public function getRoom(){
    return $this->_room;
  }

  public function getCheckIN(){
    return $this->_checkIN;
  }

  public function getCheckOUT(){
    return $this->_checkOut;
  }

  public function userCheckIN(){
    $name = $this->getName();
    $cnic = $this->getCNIC();
    $mob = $this->getMobile();
    $add = $this->getAddress();
    $rom = $this->getRoom();
    $in = $this->getCheckIN();
    $out = $this->getCheckOUT();
    if(trim($mob) == ""){
      if(trim($out) == ""){
        $this->_DB->insert("INSERT INTO `booking` (name, cnic, mobile, address, room, checkin, checkout) VALUES ('$name', '$cnic', NULL, '$add', '$rom', '$in', NULL)");
        $this->_DB->disconnect();
        echo "values inserterd";
      }
      else{
        $this->_DB->insert("INSERT INTO `booking` (name, cnic, mobile, address, room, checkin, checkout) VALUES ('$name', '$cnic', NULL, '$add', '$rom', '$in', '$out')");
        $this->_DB->disconnect();
        echo "values inserterd";
      }
    }else if(trim($out) == ""){
      $this->_DB->insert("INSERT INTO `booking` (name, cnic, mobile, address, room, checkin, checkout) VALUES ('$name', '$cnic', '$mob', '$add', '$rom', '$in', NULL)");
      $this->_DB->disconnect();
      echo "values inserterd";
    }
    else{
      $this->_DB->insert("INSERT INTO `booking` (name, cnic, mobile, address, room, checkin, checkout) VALUES ('$name', '$cnic', '$mob', '$add', '$rom', '$in', '$out')");
      $this->_DB->disconnect();
      echo "values inserterd";
    }
  }


  public function getAll(){
    $this->_DB->query('SELECT * FROM `booking` ORDER BY checkout DESC');
    return $this->_DB->row();
  }

  public function getEditGuest($userID){
    $this->_DB->query("SELECT * FROM `booking` WHERE `id` = '$userID'");
    return $this->_DB->row();
  }
}
?>
