var saveBTN = document.getElementById('saveData');
var editGuestInfo = document.getElementsByClassName("edit_guest"); // edit button
var editSave = document.getElementById('saveEditData');

document.getElementById('addNewGuest').addEventListener('click', function(){
    resetValidityFields();
    document.getElementById('formAjax').reset();
    document.getElementById("saveEditData").style.display = "none"; // hide Edit button
});

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
        beforeSend: function(){
          document.getElementById('loading').style.display = 'block';
        },
        complete: function(){
          document.getElementById('loading').style.display = 'none';
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


// Display Information in addEditGuestModal form when clicked edit button
for(var i = 0; i < editGuestInfo.length; i++){
  editGuestInfo[i].addEventListener('click', function(){
    document.getElementById("saveEditData").style.display = "block";
    document.getElementById('formAjax').reset();
    //console.log($(this).data('id'));
    $.ajax({
      type: 'POST',
      url: 'ajaxRequest.php',
      data: {
        sta: 'showEditGuest',
        id1: $(this).data('id')
      },
      beforeSend: function(){
        document.getElementById('loading').style.display = 'block';
      },
      complete: function(){
        document.getElementById('loading').style.display = 'none';
      },
      success: function(data){
        //console.log(data);
        let jData = JSON.parse(data);
        //console.log(jData[0].name);
        document.getElementById('guest-name').value = jData[0].name;
        document.getElementById('guest-cnic').value = jData[0].cnic;
        document.getElementById('guest-mob').value = jData[0].mobile;
        document.getElementById('guest-address').value = jData[0].address;
        document.getElementById('guest-checkin').value = jData[0].checkin;
        document.getElementById('guest-checkout').value = jData[0].checkout;
        document.getElementById('guest-room').value = jData[0].room;
        document.getElementById('guest-ID').value = jData[0].id;
        document.getElementById('guest-company').value = jData[0].company;
      }
    });
  });
}

// When editing guest
if(editSave){
  editSave.addEventListener('click', function () {
    let form = document.querySelector('.needs-validation');

    let formData = {
      'name':document.getElementById('guest-name').value,
      'cnic': document.getElementById('guest-cnic').value,
      'mob': document.getElementById('guest-mob').value,
      'add': document.getElementById('guest-address').value,
      'cin': document.getElementById('guest-checkin').value,
      'cou': document.getElementById('guest-checkout').value,
      'rom': document.getElementById('guest-room').value,
      'comp': document.getElementById('guest-company').value,
      'gid': document.getElementById('guest-ID').value,
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
        beforeSend: function(){
          document.getElementById('loading').style.display = 'block';
        },
        complete: function(){
          document.getElementById('loading').style.display = 'none';
        },
        success: function(data){
          console.log(data);
          document.getElementById('formAjax').reset();
          //document.getElementById('formAjaxEdit').disabled();
          setTimeout(function(){
            document.getElementById('closeModal').click();
          }, 1000);

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

  resetValidityFields();

}

function resetValidityFields(){
    if($('.needs-validation').hasClass('was-validated') === true){
        $('.needs-validation').removeClass("was-validated");
    }
}
