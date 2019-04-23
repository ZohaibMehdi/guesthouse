var saveBTN = document.getElementById('saveData');
if(saveBTN){
  saveBTN.addEventListener('click', function(){
    let form = document.querySelector('.needs-validation');

    var name = document.getElementById('guest-name').value;
    var cnic = document.getElementById('guest-cnic').value;
    var mob = document.getElementById('guest-mob').value;
    var add = document.getElementById('guest-address').value;
    var cIn = document.getElementById('guest-checkin').value;
    var cOut = document.getElementById('guest-checkout').value;
    var room = document.getElementById('guest-room').value;

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
          gOUT: cOut
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


function alertNotification(notify){
  let div = document.createElement('div');
  let el = document.getElementById('modalBody');
  div.className = "alert alert-success";
  div.innerHTML = `<p> ${notify} </p>`;
  el.appendChild(div);
  setTimeout(function(){
    div.remove();
  }, 2000);
}
