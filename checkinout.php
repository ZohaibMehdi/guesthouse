<?php
require_once('includes/Database.php');

class CheckINOUT{
  protected $_name, $_cnic, $_mobile, $_address, $_room, $_checkIN, $_checkOut, $_company, $_DB;

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

  public function setCompany($comp){
    $this->_company = $comp;
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

  public function getCompany(){
    return $this->_company;
  }

  public function userCheckIN(){
    $name = $this->getName();
    $cnic = $this->getCNIC();
    $mob = $this->getMobile();
    $add = $this->getAddress();
    $rom = $this->getRoom();
    $in = $this->getCheckIN();
    $out = $this->getCheckOUT();
    $company = $this->getCompany();

    if(trim($mob) == ""){
      if(trim($out) == ""){
        $this->_DB->insert("INSERT INTO `booking` (name, cnic, mobile, address, room, company, checkin, checkout) VALUES ('$name', '$cnic', NULL, '$add', '$rom', '$company', '$in', NULL)");
        $this->_DB->disconnect();
        echo "values inserterd";
      }
      else{
        $this->_DB->insert("INSERT INTO `booking` (name, cnic, mobile, address, room, company, checkin, checkout) VALUES ('$name', '$cnic', NULL, '$add', '$rom', '$company', '$in', '$out')");
        $this->_DB->disconnect();
        echo "values inserterd";
      }
    }else if(trim($out) == ""){
      $this->_DB->insert("INSERT INTO `booking` (name, cnic, mobile, address, room, company, checkin, checkout) VALUES ('$name', '$cnic', '$mob', '$add', '$rom', '$company', '$in', NULL)");
      $this->_DB->disconnect();
      echo "values inserterd";
    }
    else{
      $this->_DB->insert("INSERT INTO `booking` (name, cnic, mobile, address, room, company, checkin, checkout) VALUES ('$name', '$cnic', '$mob', '$add', '$rom', '$company', '$in', '$out')");
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

  public function saveEditGuest($userID){
    $name = $this->getName();
    $cnic = $this->getCNIC();
    $mob = $this->getMobile();
    $add = $this->getAddress();
    $rom = $this->getRoom();
    $in = $this->getCheckIN();
    $out = $this->getCheckOUT();
    $company = $this->getCompany();


    if(trim($mob) == ""){
      if(trim($out) == ""){
        $this->_DB->query("UPDATE `booking` SET `name` = '$name', `cnic` = '$cnic', `mobile` = NULL, `address` = '$add', `room` = '$rom', `company` = '$company',  `checkin` = '$in', `checkout` = NULL WHERE `id` = '$userID';");
        //$this->_DB->disconnect();
        echo "values Updated";
      }
      else{
        $this->_DB->query("UPDATE `booking` SET `name` = '$name', `cnic` = '$cnic', `mobile` = NULL, `address` = '$add', `room` = '$rom', `company` = '$company',  `checkin` = '$in', `checkout` = '$out' WHERE `id` = '$userID';");
        //$this->_DB->disconnect();
        echo "values updated";
      }
    }else if(trim($out) == ""){
      $this->_DB->query("UPDATE `booking` SET `name` = '$name', `cnic` = '$cnic', `mobile` = '$mob', `address` = '$add', `room` = '$rom', `company` = '$company',  `checkin` = '$in', `checkout` = NULL WHERE `id` = '$userID';");
      //$this->_DB->disconnect();
      echo "values Updated";
    }
    else{
      $this->_DB->query("UPDATE `booking` SET `name` = '$name', `cnic` = '$cnic', `mobile` = '$mob', `address` = '$add', `room` = '$rom', `company` = '$company',  `checkin` = '$in', `checkout` = '$out' WHERE `id` = '$userID';");
      //$this->_DB->disconnect();
      echo "values Updated";
    }
  }

  public function todayStatus(){
    $this->_DB->query("SELECT COUNT(*) AS today_count FROM `booking` WHERE checkin <= CURRENT_DATE AND (checkout > CURRENT_DATE OR checkout is null)");
    return $this->_DB->row();
  }

  public function todayIN(){
    $this->_DB->query("SELECT COUNT(*) AS today_in FROM `booking` WHERE checkin = CURRENT_DATE");
    return $this->_DB->row();
  }

  public function todayOUT(){
    $this->_DB->query("SELECT COUNT(*) AS today_out FROM `booking` WHERE checkout = CURRENT_DATE");
    return $this->_DB->row();
  }

  public function dashDetail($val){
    if($val == 'todayDetail'){
      $this->_DB->query("SELECT * FROM `booking` WHERE checkin <= CURRENT_DATE AND (checkout > CURRENT_DATE OR checkout is null)");
      return $this->_DB->row();
    }

    if($val == 'todayIN'){
      $this->_DB->query("SELECT * FROM `booking` WHERE checkin = CURRENT_DATE");
      return $this->_DB->row();
    }

    if($val == 'todayOUT'){
      $this->_DB->query("SELECT * FROM `booking` WHERE checkout = CURRENT_DATE");
      return $this->_DB->row();
    }
  }


  public function dateStatus($val){
      $this->_DB->query("SELECT COUNT(*) AS date_count FROM `booking` WHERE checkin <= '$val' AND (checkout > '$val' OR checkout IS NULL)");
      return $this->_DB->row();
  }

  public function dateStatusDetail($val){
      $this->_DB->query("SELECT name, cnic, room, checkin, checkout FROM `booking` WHERE checkin <= '$val' AND (checkout > '$val' OR checkout IS NULL)");
      return $this->_DB->row();
  }

  public function chartData(){
    $this->_DB->query("SELECT COUNT(*) AS total_in, checkin, DAYNAME(checkin) AS DayName FROM `booking` where checkin BETWEEN DATE(NOW() - INTERVAL 7 DAY) AND DATE(NOW() - INTERVAL 1 DAY) GROUP BY checkin");
    return $this->_DB->row();
  }

  public function chartData2(){
    $this->_DB->query("SELECT COUNT(*) AS total_out, checkout, DAYNAME(checkout) AS DayName FROM `booking` where checkout BETWEEN DATE(NOW() - INTERVAL 7 DAY) AND DATE(NOW() - INTERVAL 1 DAY) GROUP BY checkout");
    return $this->_DB->row();
  }

  public function barChart(){
    $this->_DB->query("SELECT DATE_FORMAT(checkin, '%Y') AS year, DATE_FORMAT(checkin, '%m') AS month, MONTHNAME(checkin) AS monthName, COUNT(*) AS total FROM `booking` GROUP BY DATE_FORMAT(checkin, '%Y%m')");
    return $this->_DB->row();
  }

  public function getCompanyInfo(){
    $this->_DB->query("SELECT * FROM `company_information`");
    return $this->_DB->row();
  }
}
?>
