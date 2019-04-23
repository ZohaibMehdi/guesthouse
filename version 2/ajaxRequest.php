<?php
require_once 'users.php';
require_once 'checkinout.php';


/***    Accepting the registered user    ***/


if(isset($_POST['state']) && $_POST['state'] == 1){
  if(isset($_POST['id'])){
    $user = new User;
    $id = $_POST['id'];
    $user->approveUser($id);
  }
}
else if(isset($_POST['state']) && $_POST['state']== 0){
  if(isset($_POST['id'])){
    $user = new User;
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
  $company = $_POST['company'];

  $check = new CheckINOUT;
  $check->setName($name);
  $check->setCNIC($cnic);
  $check->setMob($mob);
  $check->setAddress($add);
  $check->setRoom($room);
  $check->setCheckIN($in);
  $check->setCheckOUT($out);
  $check->setCompany($company);

  $check->userCheckIN();
}


if(isset($_POST['sta']) && $_POST['sta'] == 'showEditGuest'){
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


/***    EDIT GUEST REQUEST    ***/

if(isset($_POST['sta']) && $_POST['sta'] == 'saveEditGuest'){
  $user = new CheckINOUT;

  if(isset($_POST['data'])){
     $data = $_POST['data'];
     $user->setName($data['name']);
     $user->setCNIC($data['cnic']);
     $user->setMob($data['mob']);
     $user->setAddress($data['add']);
     $user->setRoom($data['rom']);
     $user->setCheckIN($data['cin']);
     $user->setCheckOUT($data['cou']);
     $user->setCompany($data['comp']);


     $user->saveEditGuest($data['gid']);
  }

}


/**     Dashboard AJAX REQUESTS **/

// Display today count
if(isset($_POST['sta']) && $_POST['sta'] == 'dash'){
  $user = new CheckINOUT;
  echo json_encode($user->todayStatus());
}

// Display today count details
if(isset($_POST['sta']) && $_POST['sta'] == 'dashboarddetail'){
  $user1 = new CheckINOUT;
  echo json_encode($user1->dashDetail());
}

// Display particular date count
if(isset($_POST['sta']) && $_POST['sta'] == 'datedash'){
  $user1 = new CheckINOUT;
  if(isset($_POST['date'])){
      $val = $_POST['date'];
      echo json_encode($user1->dateStatus($val));
  }
}

// Display particular date details
if(isset($_POST['sta']) && $_POST['sta'] == 'datedashdetail'){
  $user1 = new CheckINOUT;
  if(isset($_POST['date'])){
      $val = $_POST['date'];
      echo json_encode($user1->dateStatusDetail($val));
  }
}


if(isset($_POST['sta']) && $_POST['sta'] == 'chart'){
  $user1 = new CheckINOUT;
  echo json_encode($user1->chartData());
}

if(isset($_POST['sta']) && $_POST['sta'] == 'chart2'){
  $user1 = new CheckINOUT;
  echo json_encode($user1->chartData2());
}
?>
