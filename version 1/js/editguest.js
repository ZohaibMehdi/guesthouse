var editGuestInfo = document.getElementsByClassName("edit_guest");

for(var i = 0; i < editGuestInfo.length; i++){
  editGuestInfo[i].addEventListener('click', function(){
    //console.log($(this).data('id'));
    $.ajax({
      type: 'POST',
      url: 'ajaxRequest.php',
      data: {
        sta: 'guest',
        id1: $(this).data('id')
      },
      success: function(data){
        //console.log(data);
        let jData = JSON.parse(data);
        console.log(jData[0].name);
        document.getElementById('guestEdit-name').value = jData[0].name;
        document.getElementById('guestEdit-cnic').value = jData[0].cnic;
        document.getElementById('guestEdit-mob').value = jData[0].mobile;
        document.getElementById('guestEdit-address').value = jData[0].address;;
        document.getElementById('guestEdit-checkin').value = jData[0].checkin;;
        document.getElementById('guestEdit-checkout').value = jData[0].checkout;;
        document.getElementById('guestEdit-room').value = jData[0].room;;
      }
    });
  });
}
