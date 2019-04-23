<?php
require_once 'users.php';
require_once 'checkinout.php';


/***    Accepting the registered user    ***/

$user = new User;
if(isset($_POST['state']) == 1){
  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $user->approveUser($id);
  }
}
else if(isset($_POST['state']) == 0){
  if(isset($_POST['id'])){
    $id = $_POST['id'];
    $user->inActiveUser($id);
  }
}

/***    Adding new guest request    ***/

if(isset($_POST['saveuser'])){
  $name = $_POST['gname'];
  $cnic = $_POST['gCNIC'];
  $mob = $_POST['gMob'];
  $add = $_POST['gAddress'];
  $room = $_POST['gRoomNO'];
  $in = $_POST['gIN'];
  $out = $_POST['gOUT'];

  $check = new CheckINOUT;
  $check->setName($name);
  $check->setCNIC($cnic);
  $check->setMob($mob);
  $check->setAddress($add);
  $check->setRoom($room);
  $check->setCheckIN($in);
  $check->setCheckOUT($out);

  $check->userCheckIN();
}


if(isset($_POST['sta']) == 'guest'){
  $user = new CheckINOUT;
  if(isset($_POST['id1'])){
    $id = $_POST['id1'];
    // $user->getEditGuest($id);
    // foreach($user->getEditGuest($id) as $val){
    //   echo $val['name'];
    //   echo $val['cnic'];
    // }
    echo json_encode($user->getEditGuest($id));
    // print_r($user->getEditGuest($id));
  }
}
?>
