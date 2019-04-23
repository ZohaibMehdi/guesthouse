var saveBTN = document.getElementById('saveData');
var editGuestInfo = document.getElementsByClassName("edit_guest");
var editSave = document.getElementById('saveEditData');

// Display Information in form
for(var i = 0; i < editGuestInfo.length; i++){
  editGuestInfo[i].addEventListener('click', function(){
    //console.log($(this).data('id'));

    $.ajax({
      type: 'POST',
      url: 'ajaxRequest.php',
      data: {
        sta: 'showEditGuest',
        id1: $(this).data('id')
      },
      success: function(data){
        //console.log(data);
        let jData = JSON.parse(data);
        //console.log(jData[0].name);
        document.getElementById('guestEdit-name').value = jData[0].name;
        document.getElementById('guestEdit-cnic').value = jData[0].cnic;
        document.getElementById('guestEdit-mob').value = jData[0].mobile;
        document.getElementById('guestEdit-address').value = jData[0].address;
        document.getElementById('guestEdit-checkin').value = jData[0].checkin;
        document.getElementById('guestEdit-checkout').value = jData[0].checkout;
        document.getElementById('guestEdit-room').value = jData[0].room;
        document.getElementById('guestEdit-ID').value = jData[0].id;
        document.getElementById('guestEdit-company').value = jData[0].company;
      }
    });
  });
}

// When Adding new guest
if(saveBTN){
  saveBTN.addEventListener('click', function(){
    let form = document.querySelector('.needs-validation');

    let name = document.getElementById('guest-name').value;
    let cnic = document.getElementById('guest-cnic').value;
    let mob = document.getElementById('guest-mob').value;
    let add = document.getElementById('guest-address').value;
    let cIn = document.getElementById('guest-checkin').value;
    let cOut = document.getElementById('guest-checkout').value;
    let room = document.getElementById('guest-room').value;
    let company = document.getElementById('guest-company').value;

    if(form.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
      form.classList.add('was-validated');

      //console.log('Fill the required fields');
    }else{

      $.ajax({
        type: 'POST',
        url: 'ajaxRequest.php',
        data: {
          saveuser: 'saveuser',
          gname: name,
          gCNIC: cnic,
          gMob: mob,
          gAddress: add,
          gRoomNO: room,
          gIN: cIn,
          gOUT: cOut,
          company: company
        },
        success: function(data){
          document.getElementById('formAjax').reset();
          alertNotification(data);
        }
      });
      console.log('Required fields are ok');
    }

  });
}


// When editing guest
if(editSave){
  editSave.addEventListener('click', function () {
    let form = document.querySelector('.needs-validationEdit');

    let formData = {
      'name':document.getElementById('guestEdit-name').value,
      'cnic': document.getElementById('guestEdit-cnic').value,
      'mob': document.getElementById('guestEdit-mob').value,
      'add': document.getElementById('guestEdit-address').value,
      'cin': document.getElementById('guestEdit-checkin').value,
      'cou': document.getElementById('guestEdit-checkout').value,
      'rom': document.getElementById('guestEdit-room').value,
      'comp': document.getElementById('guestEdit-company').value,
      'gid': document.getElementById('guestEdit-ID').value,
    };

    if(form.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
      form.classList.add('was-validated');
    }else{
      $.ajax({
        type: 'POST',
        url: 'ajaxRequest.php',
        data: {
          sta: 'saveEditGuest',
          data: formData
        },
        success: function(data){
          console.log(data);
          document.getElementById('formAjaxEdit').reset();
        }
      });
      console.log('Required fields are ok');
    }

  });
}


function alertNotification(notify){
  let div = document.createElement('div');
  let el = document.getElementById('modalBody');
  div.className = "alert alert-success";
  div.innerHTML = `<p> ${notify} </p>`;
  el.appendChild(div);
  setTimeout(function(){
    div.remove();
  }, 2000);

  if($('.needs-validation').hasClass('was-validated') == true){
    $('.needs-validation').removeClass("was-validated");
  }

}
