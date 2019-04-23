
var acceptDeactivateUser = document.getElementsByClassName("userAction");

// Loop through each button with class -> userAction
for(var i = 0; i < acceptDeactivateUser.length; i++){

  // Assign each button a click listener
  acceptDeactivateUser[i].addEventListener("click", function(){
    // Check if the clicked button has attributes
    if(this.hasAttributes()){
      // Assign all attributes to a variable
      var attr = this.attributes;
      console.log(attr[0].name + '->' + attr[0].value);

      // Check if the first attribute (id) has value "approveUser"
      if(attr[0].value == 'approveUser'){
        // send ajax request to approve user
        $.ajax({
          type: 'POST',
          url: 'ajaxRequest.php',
          data: {
            state: 1,
            id: $(this).data('id')
          },
          success: function(data){
            alert('User has been accepted');
            location.reload();
          }
        });
      }else{
        $.ajax({
          type: 'POST',
          url: 'ajaxRequest.php',
          data: {
            state: 0,
            id: $(this).data('id')
          },
          success: function(data){
            alert('User has been inactivated');
            location.reload();
          }
        });
      }
    }

  });

}
